<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $request->validate([
            'house_id' => ['required', 'numeric', 'exists:' . House::class . ',id']
        ]);

        $house_id = $request->house_id;

        $blocks = Block::where('house_id', $house_id)->get();

        return response($blocks);
    }
}
