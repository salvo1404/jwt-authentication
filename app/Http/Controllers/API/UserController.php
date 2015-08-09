<?php

namespace App\Http\Controllers\API;

use App\Events\Activation;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Repositories\ActivationRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Transformers\AuthenticationTransformer;
use App\Transformers\ProfileTransformer;
use Event;
use JWTAuth;
use Response;
use Sorskod\Larasponse\Larasponse;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    private $fractal;
    private $userRepository;
    private $activationRepository;

    /**
     *
     * @param Larasponse                    $fractal
     * @param UserRepositoryInterface       $userRepository
     * @param ActivationRepositoryInterface $activationRepository
     */
    public function __construct(
        Larasponse $fractal,
        UserRepositoryInterface $userRepository,
        ActivationRepositoryInterface $activationRepository
    ) {
        $this->userRepository       = $userRepository;
        $this->fractal              = $fractal;
        $this->activationRepository = $activationRepository;
    }

    /**
     * @Get("api/users", as="api.users")
     *
     * @Middleware("jwt.refresh")
     * @Middleware("active")
     *
     * @return Response
     */
    public function getProfile()
    {
        $user = $this->getAuthenticatedUser();
        if (!$user) {
            return $this->respondInvalidToken();
        }

        return $this->fractal->item($user, new ProfileTransformer);
    }

    /**
     * @Get("api/users/{id}", as="api.users.show", where={"id": "[0-9]+"})
     *
     * @Middleware("jwt.refresh")
     * @Middleware("active")
     *
     * @param $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findById($id);
        if (!$user) {
            return $this->respondNotFound('User Not Found');
        }

        return $this->fractal->item($user, new ProfileTransformer);
    }

    /**
     * @Post("api/users", as="api.users")
     *
     * @Middleware("guest")
     *
     * @param UserRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $user = $this->userRepository->store($data);

        if (!$user) {
            return $this->respondEntitySavingError('Unable to register new user');
        }
        $code = $this->activationRepository->store($user->email);
//        Event::fire(new Activation($user, $code));

        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->respondWithError('Invalid Credentials');
            }
        } catch (JWTException $e) {
            return $this->respondTokenCreationFailed('Could Not Create Token');
        }

        $user = JWTAuth::toUser($token);

        return $this->fractal->item(['token' => $token, 'user' => $user], new AuthenticationTransformer);
    }

    /**
     * @Put("api/users", as="api.users")
     *
     * @Middleware("jwt.refresh")
     * @Middleware("active")
     *
     * @param UserEditRequest $request
     *
     * @return Response
     */
    public function update(UserEditRequest $request)
    {
        $user = $this->getAuthenticatedUser();
        if (!$user) {
            return $this->respondInvalidToken();
        }
        $data    = $request->all();

        $check_existing_user = $this->userRepository->findByEmail($data['email']);
        if($check_existing_user){
            if($check_existing_user->id != $user->id){
                return $this->respondEntitySavingError('Email already exists');
            }
        }
        $updated = $this->userRepository->update($user, $data);

        if (!$updated) {
            return $this->respondEntitySavingError('Unable to update user profile');
        }

        return $this->respondEntitySaved('User Profile Updated');
    }


}
