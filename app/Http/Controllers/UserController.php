<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Http\Requests\ChangePassword;
use App\Http\Requests\CreateProfileImage;
use App\Http\Requests\RechargeWithCoupon;
use App\Http\Requests\UpdateProfile;
use App\Http\Requests\User\SignIn;
use App\Http\Requests\User\SignUp;

class UserController extends Controller
{

    public function profiePic(CreateProfileImage $request)
    {
        $request->user()->addMedia($request->file('file'))->toMediaCollection('profile');
        return back()->with('alert','success:Profie Image updated successfully.');
    }

    public function updateProfile(UpdateProfile $request)
    {
        auth()->user()->update($request->validated());
        return back()->with('alert', 'success:Profile has been updated.');
    }

    public function signin(SignIn $request)
    {
        if(auth()->attempt($request->only(['email','password']))){
            return redirect('/');
        }

        return back()->with('alert','error:Could Not Perform Sign In');
    }

    public function logout()
    {
        auth()->logout();

        return redirect(route('login'));
    }

    public function signup(SignUp $request){

        $user = new \App\User;

        $user->fill($request->only(['email','password']));

        $user->role = 'agent';

        $user->save();

        auth()->login($user);

        return redirect('/');
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
        $coupon = Coupon::where('code', $request->get('code'))->first();

        if($coupon->isVoid()) {
            return response('', 410);
        }

        $coupon->setUsed();

        $request->user()->recharge($coupon->amount);

        return response('', 202);
    }
}
