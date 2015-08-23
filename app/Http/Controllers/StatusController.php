<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    /**
     * @Get("api/status", as="api.status")
     *
     * @Middleware("guest")
     *
     * @return array
     */
    public function index()
    {
        if (1 === 2) {
            $message = 'App update in progress, please come back soon.';
            return $this->respondInMaintenance($message);
        }

        return $this->respondWithSuccess("OK");
    }
}
