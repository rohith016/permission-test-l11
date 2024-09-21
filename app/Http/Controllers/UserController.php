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
     * index function
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request){
        $users = $this -> service -> getUsers($request -> search);
        return view('user.index', compact('users'));
    }
    /**
     * show function
     *
     * @param [type] $id
     * @return void
     */
    public function show($id){
        $user = $this -> service -> getUser($id);
        return view('user.show', compact('user'));
    }
}
