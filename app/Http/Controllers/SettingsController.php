<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SettingsController extends Controller
{
    public function update(Request $request)
    {
        // İsteğin doğrulanması
        $request->validate([
            'phone' => 'nullable|string',
            'password' => 'nullable|string',
            'email' => 'nullable|string|email',
        ]);

        // Kullanıcıyı bul
        $user = User::find(auth()->user()->id);

        // Telefon güncellemesi
        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }

        // Şifre güncellemesi
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        // E-posta güncellemesi
        if ($request->has('email')) {
            $user->email = $request->email;
        }

        // Kullanıcıyı kaydet
        $user->save();

        // Başarılı yanıt
        return response()->json(['success' => true, 'message' => 'Kullanıcı başarıyla güncellendi', 'data' => $user]);
    }
}
