<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $request->validate([
            'q' => ['required', 'string'],
        ]);

        $query = $request->q;

        $posts = Post::where('body', 'like', "%#$query%")->orderBy('created_at', 'DESC')->get();

        return response($posts);
    }
}
