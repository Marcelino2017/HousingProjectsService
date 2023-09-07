<?php

namespace App\Http\Controllers;

use App\Http\Requests\HousingProjectStoreRequest;
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
            'name' => $request->name,
            'description' => $request->description,
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
    public function show(HousingProject $housingProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HousingProject $housingProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HousingProject $housingProject)
    {
        //
    }
}
