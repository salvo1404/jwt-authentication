<?php
namespace App\Exceptions;

use Illuminate\Http\Response as IlluminateResponse;

class EntitySavingException extends \Exception
{
    public $message = "Entity could not be saved";
    public $code    = IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY;
}