<?php

namespace App\Http\Controllers\Auth;

use App\Events\Activation;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ActivationCodeRequest;
use App\Http\Requests\ActivationRequest;
use App\Http\Requests\AuthRequest;
use App\Repositories\ActivationRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use App\Transformers\AuthenticationTransformer;
use App\Transformers\ProfileTransformer;
use Event;
use Illuminate\Http\Response as IlluminateResponse;
use JWTAuth;
use Sorskod\Larasponse\Larasponse;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticateController extends Controller
{
    private $fractal;
    private $userRepository;
    private $activationRepository;

    /**
     * @param Larasponse                    $fractal
     * @param UserRepositoryInterface       $userRepository
     * @param ActivationRepositoryInterface $activationRepository
     */
    public function __construct(
        Larasponse $fractal,
        UserRepositoryInterface $userRepository,
        ActivationRepositoryInterface $activationRepository
    ) {
        $this->fractal              = $fractal;
        $this->userRepository       = $userRepository;
        $this->activationRepository = $activationRepository;
    }

    /**
     * @Post("api/auth/login", as="api.auth.login")
     *
     * @Middleware("guest")
     *
     * @param AuthRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->respondInvalidCredentials('Invalid Credentials');
            }
        } catch (JWTException $e) {
            return $this->respondTokenCreationFailed('Could Not Create Token');
        }

        $user = JWTAuth::toUser($token);

        if ($request->input('include') !== null) {
            $this->fractal->parseIncludes($request->input('include'));
        }

        return $this->fractal->item(['token' => $token, 'user' => $user], new AuthenticationTransformer);
    }

    /**
     * @Post("api/auth/logout", as="api.auth.logout")
     *
     * @Middleware("jwt.auth")
     * @Middleware("active")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function logout()
    {
        if (!JWTAuth::invalidate(JWTAuth::getToken())) {
            return $this
                ->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)
                ->respondWithError('Unable To Log Out User');
        }

        return $this
            ->setStatusCode(IlluminateResponse::HTTP_OK)
            ->respondWithSuccess('User Logged Out');
    }

    /**
     * @Post("api/auth/activate", as="api.auth.activate")
     *
     * @Middleware("jwt.refresh")
     *
     * @param ActivationRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @internal param $token
     *
     */
    public function activate(ActivationRequest $request)
    {
        $email      = $request->get('email');
        $activation = $this->activationRepository->getByEmail($email);
        if (!$activation) {
            return $this->respondNotFound('Email does not exist');
        }
        if ($activation->used) {
            return $this->respondWithSuccess('User already activated');
        }

        $user = $this->userRepository->findByEmail($activation->email);
        if (!$user) {
            return $this->respondNotFound('User Not Found');
        }
        if ((int)$activation->code !== $request->get('code')) {
            return $this->respondNotFound('Wrong Code');
        }
        if (!$user->active()) {
            return $this->respondEntitySavingError('Issue in User Activating');
        }
        $this->activationRepository->setUsed($activation->email);

        return $this->fractal->item($user, new ProfileTransformer);
    }

    /**
     * @Post("api/auth/resend-code", as="api.auth.resend-code")
     *
     * @Middleware("guest")
     *
     * @param ActivationCodeRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function resendCode(ActivationCodeRequest $request)
    {
        $email      = $request->get('email');
        $activation = $this->activationRepository->getByEmail($email);
        if (!$activation) {
            return $this->respondNotFound('Email Not Found in Activations Table');
        }

        $user = $this->userRepository->findByEmail($activation->email);
        if (!$user) {
            return $this->respondNotFound('User Not Found - Please Register');
        }
        Event::fire(new Activation($user, $activation->code));

        return $this->respondWithSuccess('Code Sent');
    }

}
