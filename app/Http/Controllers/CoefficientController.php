<?php

namespace App\Http\Controllers;

use App\Models\Coefficient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoefficientController extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'value' => 'required|numeric|min:0|max:9999.99',
        ]);

        $coefficient = Coefficient::find($id); // Assuming there's only one coefficient in the table

        if (!$coefficient) {
            return response()->json(['message' => 'Coefficient not found'], 404);
        }

        $coefficient->value = $request->value;
        $coefficient->save();

        return response()->json(['message' => 'Coefficient updated successfully', 'coefficient' => $coefficient]);
    }

    public function get()
    {
        $coefficients = Coefficient::all();

        return response()->json(['coefficients' => $coefficients]);
    }
}
