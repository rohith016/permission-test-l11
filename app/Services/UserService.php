<?php

namespace App\Services;

class UserService
{
    /**
     * getRequest function
     *
     * @return array
     */
    public function getRequest() : array
    {
        return [
            "status" => 200,
            "message" => "Data recieved at controller and return from service class",
            "data" => [],
        ];
    }
}
