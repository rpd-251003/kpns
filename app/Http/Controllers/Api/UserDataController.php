<?php

namespace App\Http\Controllers\Api;

use App\Models\UserData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserDataController extends Controller
{
    public function getUserData()
    {
        $userData = Auth::user()->userData;

        if (!$userData) {
            return response()->json(['message' => 'User data not found'], 404);
        }

        return response()->json($userData);
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|before:today',
            'nomor_ktp' => 'required|string|max:16|unique:user_data,nomor_ktp',
            'alamat' => 'nullable|string|max:255',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'kelurahan' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten_kota' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
            'nomor_wa' => 'nullable|string|max:15',
            'nama_bank' => 'nullable|string|max:100',
            'nama_pemilik' => 'nullable|string|max:100',
            'nomor_bank' => 'nullable|string|max:20',
        ]);

        // Memeriksa apakah data pengguna sudah ada
        if (Auth::user()->userData) {
            return response()->json(['message' => 'User data already exists'], 400);
        }

        $userData = new UserData();
        $userData->user_id = Auth::id(); // Ambil ID pengguna yang sedang login
        $userData->fill($validatedData);
        $userData->save();

        return response()->json(['message' => 'User data added successfully', 'data' => $userData], 201);
    }

    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|before:today',
            'nomor_ktp' => 'required|string|max:16|unique:user_data,nomor_ktp,' . Auth::user()->userData->id,
            'alamat' => 'nullable|string|max:255',
            'rt' => 'nullable|string|max:10',
            'rw' => 'nullable|string|max:10',
            'kelurahan' => 'nullable|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'kabupaten_kota' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
            'nomor_wa' => 'nullable|string|max:15',
            'nama_bank' => 'nullable|string|max:100',
            'nama_pemilik' => 'nullable|string|max:100',
            'nomor_bank' => 'nullable|string|max:50',
        ]);

        // Ambil user data atau buat baru jika belum ada
        $userData = Auth::user()->userData()->updateOrCreate(
            ['user_id' => Auth::id()], // Kondisi pencarian data yang ada
            $validatedData // Data yang akan diperbarui atau dibuat
        );

        return response()->json(['message' => 'User data updated or created successfully', 'data' => $userData]);
    }


    public function delete()
    {
        $userData = Auth::user()->userData;

        if (!$userData) {
            return response()->json(['message' => 'User data not found'], 404);
        }

        $userData->delete();

        return response()->json(['message' => 'User data deleted successfully']);
    }
}
