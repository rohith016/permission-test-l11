<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    /**
     * getUsers function
     *
     * @param string|null $search
     * @return LengthAwarePaginator
     */
    public function getUsers(?string $search = null): LengthAwarePaginator
    {
        return User::query()
            ->when($search, function ($query) use ($search) {
                $query->whereAny([
                    'name',
                    'email'
                ], 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10);
    }
    /**
     * getUser function
     *
     * @param [type] $id
     * @return User
     */
    public function getUser($id) : User {
        return User::find($id);
    }
    /**
     * saveUser function
     *
     * @param [type] $userRequestData
     * @return void
     */
    public function saveUser($userRequestData){
        try {
            return User::create($userRequestData);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * updateUser function
     *
     * @param [type] $userRequestData
     * @param User $user
     * @return void
     */
    public function updateUser($userRequestData, User $user){
        try {
            return $user -> update($userRequestData);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * deleteUser function
     *
     * @param User $user
     * @return void
     */
    public function deleteUser(User $user){
        try {
            return $user -> delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
