<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DocsController extends Controller
{
    /**
     * @Get("api/docs", as="api.docs")
     *
     * @Middleware("guest")
     *
     * @return array
     */
    public function index()
    {
       return view('docs');
    }
}
