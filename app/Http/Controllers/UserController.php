<?php
// app/Http/Controllers/FormController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function submitForm(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'phone' => 'required',
            'password' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            // Add validation rules for other fields
        ]);

        // Create a new form record in the database
        $form = User::create($validatedData);

        // Optionally, you can return a response indicating success
        return response()->json(['message' => 'Form submitted successfully', 'form' => $form]);
    }
}
