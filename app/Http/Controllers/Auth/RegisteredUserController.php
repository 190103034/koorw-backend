<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function verify(Request $request): Response
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class . ',username'],
            'phone' => ['required', 'string', 'max:255', 'unique:' . User::class . ',phone'],
        ]);

        return response()->noContent();
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {
        $request->validate([
            'block_id' => ['required', 'numeric', 'exists:' . Block::class . ',id'],
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:' . User::class . ',phone'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'token_name' => ['required', 'string', 'max:255']
        ]);

        $user = User::create([
            'block_id' => $request->block_id,
            'username' => $request->username,
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $block = Block::find($request->block_id);

        $user->block = $block;

        $token = $user->createToken($request->token_name)->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }
}
