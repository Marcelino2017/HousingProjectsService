<?php

namespace App\Http\Controllers\Houses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Houses\HouseStoreRequest;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
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
    public function store(HouseStoreRequest $request)
    {
        $house =House::create([
            'name' => $request->name,
            'number_rooms' => $request->number_rooms,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'housing_project' => $house,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(House $house)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, House $house)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house)
    {
        //
    }
}
