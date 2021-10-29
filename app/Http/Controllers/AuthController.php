<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index() {
        return view('app.admin.login');
    }
    public function login(Request $request){

        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'], //use bcrypt('')
            'email' => ['required']
            
        ]);
        if(Auth::attempt($credentials))
    	{
            $request->session()->regenerate();
    		return redirect()->route('admin.index');;
    	}
       // dd($request->all());
        abort(404);
    }
    
}
