<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Eğer kullanıcı bilgilerini bu modelden alıyorsanız, kullanıcı modelini eklemeyi unutmayın.

class SettingsController extends Controller
{
    public function update(Request $request, $id)
    {
        // İstekten gelen verileri doğrulayın (validate) - isteğe bağlı
        $request->validate([
            'phone' => 'string|nullable', // Telefon numarası, string türünde ve boş geçilebilir (nullable) olarak kabul ediliyor.
            'password' => 'string|nullable', // Şifre, string türünde ve boş geçilebilir (nullable) olarak kabul ediliyor.
            'email' => 'email|nullable', // E-posta adresi, geçerli bir e-posta adresi olmalı ve boş geçilebilir (nullable) olarak kabul ediliyor.
        ]);

        // Kullanıcıyı veritabanından bulun
        $user = User::findOrFail($id);

        // Güncellenecek alanları belirleyin
        $updateFields = [];

        if ($request->has('phone')) {
            $updateFields['phone'] = $request->phone;
        }

        if ($request->has('password')) {
            $updateFields['password'] = bcrypt($request->password); // Şifreyi şifrele (isteğe bağlı)
        }

        if ($request->has('email')) {
            $updateFields['email'] = $request->email;
        }

        // Kullanıcı bilgilerini güncelleyin
        $user->update($updateFields);

        // Başarılı bir yanıt döndürün
        return response()->json(['message' => 'User settings updated successfully'], 200);
    }
}
