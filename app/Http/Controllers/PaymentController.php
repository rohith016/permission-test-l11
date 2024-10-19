<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    public function __construct(public readonly PaymentService $service)
    {

    }

    public function store(Request $request){
        $res = $this -> service -> customerPayCharge();
        dd($res);

    }
}
