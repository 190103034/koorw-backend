<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'category' => ['string', 'exists:' . Category::class . ',keyword']
        ]);

        $category = $request->category;

        $user = Auth()->user();
        $block = $user->block->id;
        $house = $user->house->id;

        $visible = DB::table('posts as p')
            ->join('users as u', 'p.user_id', '=', 'u.id')
            ->join('blocks as b', 'u.block_id', '=', 'b.id')
            ->where('p.parent_id', '=', null)
            ->where(function ($query) use ($block, $house) {
                $query->where('p.visibility_id', '=', 3)
                    ->orWhere(function ($query) use ($block) {
                        $query->where('p.visibility_id', '=', 2)
                            ->where('u.block_id', '=', $block);
                    })
                    ->orWhere(function ($query) use ($house) {
                        $query->where('p.visibility_id', '=', 1)
                            ->where('b.house_id', '=', $house);
                    });
            })
            ->select('p.*')
            ->pluck('id');

        $categories = Category::pluck('keyword');

        if ($category) {
            $posts = Post::whereIn('id', $visible)
                ->where('category_id', '=', function ($query) use ($category) {
                    $query->select('id')
                        ->from('categories')
                        ->where('keyword', '=', $category);
                })
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        } else {
            $posts = Post::whereIn('id', $visible)
                ->orderBy('created_at', 'DESC')
                ->paginate(10);
        }

        return response($posts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $hash_id)
    {
        $post = Post::where('hash_id', $hash_id)->with(['childPosts'])->first();

        return response($post, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
