<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'tanggal_lahir',
        'nomor_ktp',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'provinsi',
        'kode_pos',
        'nomor_wa',
        'nama_bank',
        'nama_pemilik',
        'nomor_bank',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
