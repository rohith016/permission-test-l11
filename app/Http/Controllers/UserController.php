<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    /**
     * __construct function
     *
     * @param UserService $service
     */
    public function __construct(public readonly UserService $service){}
    /**
     * getRequest function
     *
     * @param Request $request
     * @return array
     */
    public function getRequest(Request $request) : array
    {
        return $this -> service -> getRequest();
    }
}
