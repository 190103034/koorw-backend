<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): Response
    {
        $request->validate(([
            'user_id' => ['required', 'exists:' . User::class . ',id'],
            'picture' => ['required']
        ]));

        $user = User::find($request->user_id);

        $pictureName = time() . '.' . $request->picture->getClientOriginalExtension();
        $request->picture->move(public_path('images'), $pictureName);
        $user->picture = $pictureName;
        $user->save();

        return response($user->picture);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): Response
    {
        $user = User::where('id', $user->id)->with(['posts' => function ($query) {
            $query->where('parent_id', null)->orderBy('created_at', 'DESC');
        }])->first();

        return response($user, 200);
    }
}
