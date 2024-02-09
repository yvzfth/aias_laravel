<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function updatePhone(Request $request)
    {
        $request->validate([
            'phone' => 'required|unique:users,phone,' . Auth::id(),
        ]);

        try {
            $user = Auth::user();
            $user->phone = $request->phone;
            $user->save();
            
            return response()->json(['message' => 'Phone number updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update phone number'], 500);
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        try {
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();
            
            return response()->json(['message' => 'Password updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update password'], 500);
        }
    }

    public function updateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        try {
            $user = Auth::user();
            $user->email = $request->email;
            $user->save();
            
            return response()->json(['message' => 'Email updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update email'], 500);
        }
    }
}
