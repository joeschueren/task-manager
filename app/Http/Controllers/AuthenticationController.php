<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AuthenticationController extends Controller{

    public function Login(Request $request){
        $email = $request->input("email");
        $password = $request->input("password");

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $user = Auth::user();

            Session::put('email', $user->email);

            return Redirect("app/dashboard");
        } else {
            return response()->json(["message" => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

    }

    public function Register(Request $request){
        $email = $request->input("email");
        $password = $request->input("password");

        Log::Info("in register" . $email . $password);

        $request->validate([
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        try{
            $user = User::create([
                'name' => "",
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified_at' => null,
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            Auth::login($user);

            return response()->json(['Success'], 200);

        } catch (Exception $e) {
            Log::info(e);
            return response()->json(['error' => 'Failed to register user'], 500);
        }

    }
}