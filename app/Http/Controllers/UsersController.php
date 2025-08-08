<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //

    function index(Request $request)
    {
        $user=User::with('phone')->get();
     
        return view('users',['data'=>$user]);
    }
}
