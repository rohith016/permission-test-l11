<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    /**
     * __construct function
     *
     * @param PaymentService $service
     */
    public function __construct(public readonly PaymentService $service){}
    /**
     * store function
     *
     * @param Request $request
     * @return void
     */
    public function store(PaymentRequest $request){
        try {
            $res = $this -> service -> customerPayCharge();
            dd($res);
            //code...
        } catch (\App\Exceptions\PaymentException $e) {
            // throw $e;
            return $e -> getMessage();
            // return back()->withError($e -> getMessage());
        } catch (\Throwable $th) {
            throw $th;
            return $th -> getMessage();
            // return back()->withError($th -> getMessage());
        }

    }
}
