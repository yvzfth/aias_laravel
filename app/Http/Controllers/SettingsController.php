<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SettingsController extends Controller
{
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // İlgili sütunları güncelle
        $user->update([
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
        ]);

        return response()->json(['message' => 'Kullanıcı başarıyla güncellendi'], 200);
    }
}
