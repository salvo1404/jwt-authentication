<?php

namespace App\Http\Controllers\Auth;

use App\Events\ForgotPassword;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordForgotRequest;
use App\Repositories\UserRepositoryInterface;
use Event;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    public function __construct(UserRepositoryInterface $userRepository, Mailer $mailer)
    {
        $this->mailer         = $mailer;
        $this->userRepository = $userRepository;
        $this->middleware('guest');
    }

    /**
     * @Post("api/auth/forgot-password", as="api.auth.forgot-password")
     *
     * This function sends user reset password link through email
     *
     * @param PasswordForgotRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function forgotPassword(PasswordForgotRequest $request)
    {
        $user = $this->userRepository->findByEmail($request->get('email'));
        if (!$user) {
            return $this->respondNotFound('User Not Found');
        }

        $password = $this->generatePassword();

        Event::fire(new ForgotPassword($user, $password));

        $reset = $this->userRepository->resetPassword($user, $password);
        if (!$reset) {
            return $this->respondEntitySavingError('Issue Updating Password');
        }

        return $this->respondWithSuccess('New Password Sent');
    }

    /**
     * @return string
     */
    public function generatePassword()
    {
        return str_random(8);
    }
}
