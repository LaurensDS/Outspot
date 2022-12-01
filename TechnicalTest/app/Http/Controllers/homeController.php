<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class homeController extends Controller
{
    public function index(Request $request)
    {
        return view('welcome');
    }

    public function pay(Request $request)
    {
        $amount = number_format((float)$request->input('amount'), 2, '.', ''); 
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $amount // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order #12345",
            "redirectUrl" => route('welcome'),
            "metadata" => [
                "order_id" => "12345",
            ],
        ]);
        
        session(['id' => $payment->id]);
        session(['status' =>$payment->status]);

    
        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }
}
