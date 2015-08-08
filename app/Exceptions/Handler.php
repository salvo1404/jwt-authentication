<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tymon\JWTAuth\Exceptions\InvalidClaimException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\PayloadException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Http\Response as IlluminateResponse;
use Tymon\JWTAuth\Facades\JWTAuth;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof TokenExpiredException) {
            return $this->respondWithError(461, 'Token Expired');
        } else if ($e instanceof TokenInvalidException) {
            return $this->respondWithError(462, 'Token Invalid');
        } else if ($e instanceof TokenBlacklistedException) {
            return $this->respondWithError(463, 'Token Blacklisted');
        } else if ($e instanceof InvalidClaimException) {
            return $this->respondWithError(464, 'JWT Invalid Claim Exception');
        } else if ($e instanceof PayloadException) {
            return $this->respondWithError(500, 'JWT Payload Exception');
        } else if ($e instanceof JWTException) {
            return $this->respondWithError(460, $e->getMessage());
        } else if ($e instanceof NotFoundHttpException) {
            return $this->respondWithError(IlluminateResponse::HTTP_NOT_FOUND, 'Http Route Not Found');
        } else if ($e instanceof MethodNotAllowedHttpException) {
            return $this->respondWithError(IlluminateResponse::HTTP_METHOD_NOT_ALLOWED, 'Method Not Allowed');
        }

        return parent::render($request, $e);
    }

    /**
     * @param $code
     * @param $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondWithError($code, $message)
    {
        return response()->json(
            [
                'error' => [
                    'message'     => $message,
                    'status_code' => $code,
                ]
            ], $code
        );
    }
}
