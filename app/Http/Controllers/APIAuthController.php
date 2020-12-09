<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class APIAuthController extends Controller
{
    public function login(Request $request)
    {
        $loginData = Validator::make($request->json()->all(), [
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken],200);

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'access_token' => $accessToken],200);
    }
}
