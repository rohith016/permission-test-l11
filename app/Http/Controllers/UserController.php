<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

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
     * create function
     *
     * @return void
     */
    public function create(){
        return view('user.create');
    }
    /**
     * store function
     *
     * @param StoreUserRequest $request
     * @return void
     */
    public function store(StoreUserRequest $request){
        $this -> service -> saveUser($request->validated());
        return redirect()->route('users.index');
    }
    /**
     * edit function
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user){
        return view('user.edit', compact('user'));
    }
    /**
     * update function
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return void
     */
    public function update(UpdateUserRequest $request, User $user){
        $this -> service -> updateUser($request -> validated(), $user);
        return redirect()->route('users.index');
    }
    /**
     * destroy function
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user){
        $this -> service -> deleteUser($user);
        return redirect()->route('users.index');
    }
}
