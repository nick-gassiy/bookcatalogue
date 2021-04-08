<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signIn()
    {
        return view('sign_in');
    }

    public function signInSubmit(Request $request)
    {
        $user = User::where('name',$request->input('name'))->first();
        if(Hash::check($request->input('pass'),$user->password)){
            Auth::login($user);
        }
        return redirect()->route('all.books');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('all.books');
    }
}
