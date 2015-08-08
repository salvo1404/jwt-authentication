<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response as IlluminateResponse;
use JWTAuth;
use Response;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    protected $statusCode = 200;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthenticatedUser()
    {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return null;
        }

        return $user;
    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function respondInMaintenance($message = 'Maintenance')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_SERVICE_UNAVAILABLE)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function respondGameStateNotFound($message = 'Game State Not Found')
    {
        return $this->setStatusCode(491)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function respondNotFound($message = 'Not Found')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function respondEntityDeleted($message = 'Entity Deleted')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_OK)->respondWithSuccess($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function respondEntityDeletionError($message = 'Entity Deletion Error')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function respondEntitySaved($message = 'Entity Saved')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_OK)->respondWithSuccess($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function respondEntitySavingError($message = 'Entity Saving Error')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function respondMethodNotAllowed($message = 'Method Not Allowed')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_METHOD_NOT_ALLOWED)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondInvalidToken($message = 'Invalid Token')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNAUTHORIZED)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondTokenCreationFailed($message = 'Token Creation Failed')
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondWithInvalidEmail($message = "Invalid Email Address")
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_ACCEPTABLE)->respondWithError($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondWithUserPasswordChanged($message = "User Password Changed Successfully")
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_OK)->respondWithSuccess($message);
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondEntitiesSaved($message = "Entities Saved")
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_OK)->respondWithSuccess($message);
    }

    /**
     * @param string $message
     * @param array  $errors
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondErrorsSavingEntities($message = 'Entities Failed to Save', $errors = [])
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)
                    ->respondWithErrors($message, $errors);
    }

    /**
     * @param       $data
     * @param array $headers
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    /**
     * @param $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondWithError($message)
    {
        return $this->respond(
            [
                'error' => [
                    'message'     => $message,
                    'status_code' => $this->getStatusCode(),
                ]
            ]
        );
    }

    /**
     * @param $message
     * @param $errors
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondWithErrors($message, $errors)
    {
        return $this->respond(
            [
                'error' => [
                    'message'     => $message,
                    'errors'      => $errors,
                    'status_code' => $this->getStatusCode(),
                ]
            ]
        );
    }

    /**
     * @param $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function respondWithSuccess($message)
    {
        return $this->respond(
            [
                'success' => [
                    'message'     => $message,
                    'status_code' => $this->getStatusCode(),
                ]
            ]
        );
    }

    /**
     * @param string $message
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function respondWithServerTimestamp($message = 'OK')
    {
        return $this->respond(
            [
                'server_timestamp' =>   Carbon::now()->timestamp,
                'success'          => [
                    'message'           => $message,
                    'status_code'       => $this->getStatusCode(),
                ]
            ]
        );
    }
}
