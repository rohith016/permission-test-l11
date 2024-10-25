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
        try {
            $res = $this -> service -> customerPayCharge();
            dd($res);
            //code...
        } catch (\App\Exceptions\PaymentException $e) {
            // throw $e;
            return $e -> getMessage() . ' error here on PaymentException';
            // return back()->withError($e -> getMessage());
        } catch (\Throwable $th) {
            // throw $th;
            return $th -> getMessage() . ' error here on Throwable';
            // return back()->withError($th -> getMessage());
        }

    }
}
