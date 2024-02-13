<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ActivityController extends Controller
{
    public function activity()
    {
        $activities = Activity::all();
        return response()->json($activities);
    }

    public function store(Request $request)
    {
        // Validate request data
        // $validatedData = $request->validate([
        //     'academic_activity_type' => 'required|string',
        //     'activity_id' => 'required|string',
        //     'description' => 'required|string',
        //     'point' => 'required|numeric',
        // ]);
        $data = $request->json()->all();
        Log::error($data);
        // Create new activity
        return Activity::create($data);
    }

    public function update(Request $request)
    {
        try {
            // Validate request data
            $activity = Activity::findOrFail($request->id);

            // Get JSON payload
            $data = $request->json()->all();
            // Update the activity
            $activity->update($data);
            $activity->save();
            // Return a success response
            return response()->json([
                'message' => 'Activity updated successfully',
                'activity' => $activity
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return a validation error response
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            // Return a general error response
            return response()->json([
                'message' => 'Error updating activity',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        // Delete the activity
        $activity->delete();
        return response()->json(['message' => 'Activity deleted successfully']);
    }
}
