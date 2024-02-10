<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', // Eğer ayarlar bir kullanıcıya özgü ise kullanıcı ID'si
        'phone',   // Telefon numarası
        'password', // Şifre (şifrelenmiş olarak saklanmalıdır)
        'email',    // E-posta adresi
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', // JSON dönüşümlerinde şifrenin gizlenmesi
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
