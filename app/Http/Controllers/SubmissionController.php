<?php
namespace App\Http\Controllers;

use App\Models\Submission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        try {
            $submission = new Submission();
    
            // Filling the submission with all data from the request
            $submission->fill($request->all());
    
            // Save the file if it exists in the request
            if ($request->hasFile('file')) {
                $directory = "public/submissions/";
                $path = $request->file('file')->store($directory);
    
                // Saving the file path to the submission
                $submission->file_path = $path;
            }
    
            // Saving the submission to the database
            $submission->save();
    
            // Returning a response indicating success
            return response()->json(['message' => 'Submission created successfully'], 201);
        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Form creation failed: ' . $e->getMessage() . ' Stack trace: ' . $e->getTraceAsString());
            return response()->json(['error' => 'Form creation failed'], 500);
        }
    }
    
}
