<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }
    public function store(Request $request)
    {
       
        if(!Auth::attempt( $request->validate([
            'email'=>'required|string|email',
            'password' =>'required|string'
        ]),true)){
            throw ValidationException::withMessages([
                'email' => 'Authentication failed' 
            ]);
    }
        $request->session()->regenerate();
        return redirect()->intended('/listing');
    }
    public function destroy(Request $request)
    {  
        Auth::logout();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect()->route('listing.index');
    }
}
