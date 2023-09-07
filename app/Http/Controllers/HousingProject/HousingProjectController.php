<?php

namespace App\Http\Controllers\HousingProject;

use App\Http\Controllers\Controller;
use App\Http\Requests\HousingProjects\HousingProjectStoreRequest;
use App\Models\HousingProject;
use Illuminate\Http\Request;

class HousingProjectController extends Controller
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
    public function store(HousingProjectStoreRequest $request)
    {
        $housingProject = HousingProject::create([
            'house_id' => $request->house_id,
            'user_id' => $request->user_id,
            'payment_number' => $request->payment_number,
        ]);

        return response()->json([
            'housing_project' => $housingProject,
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $housingProject)
    {
        try {
            $housing = HousingProject::findOrFail($housingProject);
            return response()->json($housing);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Proyecto de vivienda no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HousingProject $housingProject)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HousingProject $housingProject)
    {
        //
    }
}
