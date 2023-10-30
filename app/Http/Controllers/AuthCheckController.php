<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheckController extends Controller
{
    public function authCheck()
    {
        if(Auth::user()->usertype == 'user')
        {
            return redirect()->to('/user-dashboard');
        }
        elseif(Auth::user()->usertype == 'admin')
        {
            return redirect()->to('/admin-dashboard');
        }
    }
}
