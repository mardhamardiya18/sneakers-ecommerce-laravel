<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthCheckController extends Controller
{
    public function check(Request $request)
    {
        return User::where('email', $request->email)->count() > 0 ? 'Unavailable' : 'Available';
    }
}
