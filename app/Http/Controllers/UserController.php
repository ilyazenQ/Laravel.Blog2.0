<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function sub(Request $request) {
        Subscription::create($request->all());
        return redirect()->route('home');
    }
}
