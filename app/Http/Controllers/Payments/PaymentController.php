<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payments\PaymentProjectStoreRequest;
use App\Http\Resources\Payments\PaymentProjectResource;
use App\Models\HousingProject;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
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
    public function store(PaymentProjectStoreRequest $request)
    {
        $housingProject = HousingProject::find($request->housing_project_id);

        if (!$housingProject) {
            return response()->json(['message' => 'Proyecto de vivienda no encontrado'], 404);
        }

        if ($request->amount > $housingProject->house->price) {
            return response()->json(['message' => 'El monto a pagar supera la el precio del Proyecto de vivienda'], 404);
        }

        $payments = Payment::where('housing_project_id', $request->housing_project_id)->get();
        $sumTotal = $payments->sum('amount') + $request->amount;
        $totalPay = $payments->count()  + 1;

        if ($sumTotal > $housingProject->house->price) {
            return response()->json(['message' => 'El monto a pagar supera el precio total del Proyecto de vivienda'], 404);
        }

        if ($totalPay > $housingProject->payment_number) {
            return response()->json(['message' => 'El monto a pagar supera el numero de cuota del proyecto de vivienda'], 404);
        }

        $newPayment = Payment::create([
            'housing_project_id' => $request->housing_project_id,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
        ]);

        return new PaymentProjectResource($newPayment);
    }



    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
