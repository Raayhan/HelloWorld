<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    public function __construct(){

        $this->middleware(['guest']);

    }
    public function index(){
        return view('auth.register');
    }

    public function register(Request $request){

        $this->validate($request, [
            'name'=> 'required|max:255',
            'email'=> 'required|email',
            'username'=> 'required|max:255',
            'password'=> 'required|confirmed',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);
        auth()->attempt($request->only('email','password'));

        return redirect()->route('dashboard');

    }
}
