<?php

namespace App\Http\Controllers;


use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            // Define validation rules for each field
        ]);

        // Create a new Submission instance and fill it with validated data
        $submission = new Submission();
        $submission->fill($validatedData);

        // Save the submission
        $submission->save();

        // Return a response indicating success
        return response()->json(['message' => 'Submission created successfully'], 201);
    }
}
