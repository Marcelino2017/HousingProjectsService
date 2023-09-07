<?php

namespace App\Http\Controllers\Houses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Houses\HouseStoreRequest;
use App\Http\Requests\Houses\HouseUpdateRequest;
use App\Http\Resources\Houses\HouseResource;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HouseResource::collection(House::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HouseStoreRequest $request)
    {
        $house = House::create([
            'name' => $request->name,
            'number_rooms' => $request->number_rooms,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return new HouseResource($house);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $houseId)
    {
        try {
            $house = House::findOrFail($houseId);
            return new HouseResource($house);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Casa no encontrada'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HouseUpdateRequest $request, int $houseId)
    {
        try {
            $house = House::findOrFail($houseId);
            $houseUpdate = $house->fill($request->all());
            return new HouseResource($houseUpdate);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Casa no encontrada'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house)
    {
        $house->delete();
        return response()->json([
            'message' => 'Se eliminó con éxito la vivienda'
        ]);
    }
}
