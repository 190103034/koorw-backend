<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Street;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $request->validate([
            'street_id' => ['required', 'numeric', 'exists:' . Street::class . ',id']
        ]);

        $street_id = $request->street_id;

        $houses = House::where('street_id', $street_id)->get();

        return response($houses);
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house): Response
    {
        $house = House::where('id', $house->id)->with(['services'])->first();

        return response($house, 200);
    }

    /**
     * Verify secret code for the specified resource.
     */
    public function verify(Request $request): Response
    {
        $request->validate([
            'house_id' => ['required', 'numeric', 'exists:' . House::class . ',id'],
            'secret_code' => ['required', 'string']
        ]);

        $house = House::where('id', $request->house_id)->where('secret_code', $request->secret_code)->exists();

        return response($house);
    }
}
