<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $name = $request->input('name');

        $user = User::create([
            'email' => $email,
            'password' => Hash::make($password),
            'name' => $name,
        ]);

        $token = $user->createToken('register')->accessToken;
        return $this->setCustomData('user', new UserResource($user))
            ->setCustomData('token', $token)
            ->responseSuccess();
    }

    public function login(LoginRequest $request)
    {

        if (!auth()->attempt($request->only('email', 'password'))) {
            $errors = [
                'password' => ['Password is not correct.'],
            ];
            return $this->setMessage($errors)->setStatusCode(422)->responseValidation();
        }
        $user = auth()->user();

        $token = $user->createToken('login')->accessToken;

        return $this->setCustomData('user', new UserResource($user))
            ->setCustomData('token', $token)
            ->responseSuccess();
    }
}
