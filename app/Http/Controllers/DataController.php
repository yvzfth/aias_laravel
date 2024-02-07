<?php

namespace App\Http\Controllers;

use App\Models\AkademikTabloTesvik; // Import your model if necessary
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $data = AkademikTabloTesvik::all(); // Retrieve all data from the database
        return response()->json($data);
    }
}
