<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank',
        'nama_lengkap',
        'no_rek',
        'nominal',
        'keterangan',
        'status',
    ];

    // Relasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
