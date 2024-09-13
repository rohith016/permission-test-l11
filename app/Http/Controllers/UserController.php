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


    public function index(Request $request){
        $users = $this -> service -> getUsers($request -> search);
        return view('user.index', compact('users'));
    }

    public function show($id){
        $user = $this -> service -> getUser($id);
        return view('user.show', compact('user'));
    }
}
