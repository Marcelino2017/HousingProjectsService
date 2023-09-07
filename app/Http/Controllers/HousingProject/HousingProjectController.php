<?php

namespace App\Http\Controllers\HousingProject;

use App\Http\Controllers\Controller;
use App\Http\Requests\HousingProjects\HousingProjectStoreRequest;
use App\Http\Requests\HousingProjects\HousingProjectUpdateRequest;
use App\Http\Resources\HousingProject\HousingProjectResource;
use App\Models\HousingProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HousingProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return HousingProjectResource::collection(HousingProject::with(['user', 'house'])->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HousingProjectStoreRequest $request)
    {
        $housingProject = HousingProject::create([
            'house_id' => $request->house_id,
            'user_id' => $request->user_id,
            'payment_number' => $request->payment_number,
        ]);

        return new HousingProjectResource($housingProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $housingProject)
    {
        try {
            $housing = HousingProject::findOrFail($housingProject);
            return new HousingProjectResource($housing);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Proyecto de vivienda no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HousingProjectUpdateRequest $request, int $housingProjectId)
    {
        try {
            $housingProject = HousingProject::findOrFail($housingProjectId);
            $housingProject->fill($request->all())->save();
            return new HousingProjectResource($housingProject);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Proyecto de vivienda no encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HousingProject $housingProject)
    {
        $housingProject->delete();
        return response()->json([
            'message' => 'Se eliminó con éxito el Proyecto de Vivienda'
        ]);
    }
}
