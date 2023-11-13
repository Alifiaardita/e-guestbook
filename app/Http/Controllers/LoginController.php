<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');


}

public function authenticate( Request $request){

    // dd($request);
    $credentials = $request->validate([
        'email'=> 'required|email',
        'password'=> 'required'
    ]);

    if(Auth::attempt($credentials)){
        $request->session()->regenerate();

        return redirect()->intended(route('admin'));
    }

    return back()->withErrors([
        'email' => 'Pastikan Email dan password yang anda masukan sudah benar'
    ])->onlyInput('email');

}

public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');

}
}
