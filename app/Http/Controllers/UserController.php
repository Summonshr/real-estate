<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Http\Requests\ChangePassword;
use App\Http\Requests\RechargeWithCoupon;
use App\Http\Requests\User\SignIn;
use App\Http\Requests\User\SignUp;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signin(SignIn $request)
    {
        if(auth()->attempt($request->only(['email','password']))){
            return response('', 202);
        }

        return response('', 401);
    }

    public function signup(SignUp $request){

        $user = new \App\User;
        $user->fill($request->only(['email','name','password']));
        $user->role = 'agent';
        $user->save();

        return response('', 201);
    }

    public function changePassword(ChangePassword $request)
    {
        $user = $request->user();
        $user->password = $request->get('password');
        $user->save();
        return response('',202);
    }

    public function recharge(RechargeWithCoupon $request)
    {
        $coupon = Coupon::where('code',$request->get('code'))->first();

        $coupon->decrement('count');

        $coupon->save();

        $user = $request->user();

        $user->balance += $coupon->amount;

        $user->save();

        return response('', 202);
    }
}
