<?php

namespace App\Http\Controllers;

use App\Models\Visibility;
use Illuminate\Http\Request;

class VisibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visibilities = Visibility::all();

        return response($visibilities, 200);
    }
}
