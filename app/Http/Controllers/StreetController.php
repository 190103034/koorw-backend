<?php

namespace App\Http\Controllers;

use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StreetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response(Street::all());
    }
}
