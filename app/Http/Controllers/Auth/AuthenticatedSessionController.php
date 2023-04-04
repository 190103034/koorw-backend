<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): Response
    {
        $request->validate([
            'username' => ['required', 'string', 'exists:' . User::class . ',username'],
            'password' => ['required', Rules\Password::defaults()],
            'token_name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return response([
                'message' => __('passwords.user')
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response([
                'message' => __('auth.password')
            ], 401);
        }

        $token = $user->createToken($request->token_name)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
        $request->user()->currentAccessToken()->delete();

        return response([
            "message" => "Logged out"
        ], 200);
    }
}
