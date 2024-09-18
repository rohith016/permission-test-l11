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
     * @param [type] $key
     * @return User
     */
    public function getUsers($key = null): LengthAwarePaginator {
        return User::query()
            ->when($key, function($query) use($key){
                $query -> orWhere('name', 'like', "%$key%");
                $query -> orWhere('email', 'like', "%$key%");
            })
            ->oldest()
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
}
