<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function CheckoutStore(Request $request){

        $data = array();
    	$data['name'] = $request->name;
    	$data['email'] = $request->email;
    	$data['phone'] = $request->phone;
    	$data['postcode'] = $request->postcode;
    	$data['adress'] = $request->adress;
    	$data['city'] = $request->city;
    	// $data['country'] = $request->country;
    	$data['notes'] = $request->notes;


    	if ($request->payment_method == 'stripe') {
    		return view('frontend.payment.stripe',compact('data'));
    	}elseif ($request->payment_method == 'card') {
    		return 'card';
    	}else{
            return 'cash';
    	}
    }
}
