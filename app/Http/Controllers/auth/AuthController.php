<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public  function  login()
    {
        return view('auth.login');
    }
    public function  register()
    {
        return view('auth.register');
    }
    public function  postLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        }
        return redirect()->back()->with('error','Email-Address And Password Are Wrong.');
    }
    public function  postRegister(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        auth()->login($user);
        return redirect()->route('home');
    }
}
