<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
 
public function login(Request $request){

    $login=$request->validate([
        'email' => 'required|string',
        'password' => 'required|string',
    ]);

    if( !Auth::attempt($login)){
        return response(['message' => 'invalid login token']);
    }

    $accessToken=Auth::user()->createToken('authToken')->accessToken;
    return response(['user' => Auth::user(), 'access_token' => $accessToken]);
}

}
  