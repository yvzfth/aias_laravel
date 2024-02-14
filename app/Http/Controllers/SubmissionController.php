<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class SubmissionController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Start with all submissions
            $submissions = Submission::query();

            // Filter by faculty name if provided in the request
            if ($request->has('faculty')) {
                $submissions->where('faculty', $request->input('faculty'));
            }

            // Filter by submission period if provided in the request
            if ($request->has('submission_period')) {
                $submissions->where('submission_period', $request->input('submission_period'));
            }

            // Get the filtered submissions
            $filteredSubmissions = $submissions->get();

            // Returning a response with the filtered submissions
            return response()->json($filteredSubmissions, 200);
        } catch (Exception $e) {
            // Log the error for debugging
            $errorMessage = 'Error fetching submissions: ' . $e->getMessage() .
                ', File: ' . $e->getFile() .
                ', Line: ' . $e->getLine() .
                ', Stack trace: ' . $e->getTraceAsString();
            Log::error($errorMessage);

            // Include the error message in the response
            return response()->json([
                'error' => 'Error fetching submissions',
                'details' => $errorMessage
            ], 500);
        }
    }
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
        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . $e->getMessage());
            return response()->json(['error' => 'Validation failed'], 422);
        } catch (QueryException $e) {
            // Create a detailed error message
            $errorMessage = 'Database error: ' . $e->getMessage() .
                ', File: ' . $e->getFile() .
                ', Line: ' . $e->getLine() .
                ', Stack trace: ' . $e->getTraceAsString();

            // Log the detailed error message
            Log::error($errorMessage);

            // Include the detailed error message in the response
            return response()->json([
                'error' => 'Database error',
                'details' => $errorMessage
            ], 500);
        } catch (FileNotFoundException $e) {
            Log::error('File error: ' . $e->getMessage());
            return response()->json(['error' => 'File error'], 500);
        } catch (Exception $e) {
            // Log the error for debugging
            $errorMessage = 'Form creation failed: ' . $e->getMessage() .
                ', File: ' . $e->getFile() .
                ', Line: ' . $e->getLine() .
                ', Stack trace: ' . $e->getTraceAsString();
            Log::error($errorMessage);

            // Include the error message in the response
            return response()->json([
                'error' => 'Form creation failed',
                'details' => $errorMessage
            ], 500);
        }
    }
}
