<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    //

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        $status = 'Login fail';
        if (Auth::attempt($credentials)) {
            $status = 'Login Success';
        }

        return response()->json(['status' => $status]);
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $status = 'register fail';
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            $status = 'register invalid';
        } else {
            $check = $this->insertUser($data);
            if (isset($check)) {
                $status = 'register success';
            }
        }

        return response()->json(['status' => $status]);
    }

    public function insertUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
