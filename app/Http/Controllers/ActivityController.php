<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

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
        $validatedData = $request->validate([
            'academic_activity_type' => 'required|string',
            'activity_id' => 'required|string',
            'description' => 'required|string',
            'point' => 'required|numeric',
        ]);

        // Create new activity
        return Activity::create($validatedData);
    }

    public function update(Request $request, Activity $activity)
    {
        // Validate request data
        $validatedData = $request->validate([
            'academic_activity_type' => 'required|string',
            'activity_id' => 'required|string',
            'description' => 'required|string',
            'point' => 'required|numeric',
        ]);

        // Update the activity
        $activity->update($validatedData);

        return $activity;
    }

    public function destroy(Activity $activity)
    {
        // Delete the activity
        $activity->delete();

        return response()->json(['message' => 'Activity deleted successfully']);
    }
}
