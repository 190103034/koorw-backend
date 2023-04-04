<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => ['required', 'integer', 'exists:' . Post::class . ',id']
        ]);

        $user = Auth()->user();



        $like = Like::create([
            'post_id' => $request->post_id,
            'user_id' => $user->id
        ]);

        return response($like, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $post_id)
    {
        $user = Auth()->user();

        $like = Like::where('post_id', $post_id)->where('user_id', $user->id)->firstOrFail();

        return response($like->delete(), 200);
    }
}
