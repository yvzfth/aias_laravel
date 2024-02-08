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
        $request->validate([
            'academic_activity_type' => 'required|string|max:255',
            'activity_id' => 'required|string|max:255',
            'description' => 'required|string',
            'point' => 'numeric|nullable',
        ]);

        $activity = Activity::create($request->all());

        return response()->json($activity, 201);
    }
}
