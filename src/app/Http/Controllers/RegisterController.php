<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\WeightRequest;


class RegisterController extends Controller
{
    //
    public function user(){
        return view('user_register');
    }

    public function userRegister(RegisterRequest $request){
        session(
            [
                'register.name' => $request->name,
                'register.email' => $request->email,
                'register.password' => $request->password
            ]
        );

        return redirect('/register/step2');
    }

    public function weight(){
        if (!session()->has('register.name')) {
            return redirect('/register/step1');
        }

        return view('weight_register');
    }

    public function weightRegister(WeightRequest $request){
        $user = User::create(
            [
                'name' => session('register.name'),
                'email' => session('register.email'),
                'password' => session('register.password'),

            ]
        );

        session() -> forget('register');

        Auth::login($user);

        return redirect('/weight_logs');
    }
}
