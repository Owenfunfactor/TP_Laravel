<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function login()
    {


        return view('auth.login');
    }

    public function create(){
        $user = new User();

        return view('auth.SignIn', [
            'user' =>  $user
        ]);
    }

    public function store(SignInRequest $request)
    {
        $user = User::create($request->validated());
        return to_route('car.index');
    }

    public function dologin(LoginRequest $request){
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors([
            'email' => 'Identifiants incorect'
        ])->onlyInput('email');
    }

    public function logout() {
        Auth::logout();
        return to_route('car.index');
    }
}
