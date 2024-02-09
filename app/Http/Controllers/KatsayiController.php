<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Katsayi;

class KatsayiController extends Controller
{
    public function index()
    {
        $katsayilar = Katsayi::all();
        return response()->json($katsayilar);
    }

    public function update(Request $request, $id)
    {
        $katsayi = Katsayi::findOrFail($id);
        $katsayi->update($request->all());
        return response()->json($katsayi);
    }
}
