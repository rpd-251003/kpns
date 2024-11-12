<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    // Register user baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    // Login user
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            Log::error('Failed JWT attempt', ['credentials' => $credentials]);
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Tambahkan cookie baru
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ])->cookie(
            'token',          // Nama Cookie
            $token,           // Nilai Cookie (JWT token)
            60 * 24 * 30,     // Durasi dalam menit (1 bulan)
            '/',              // Path
            null,             // Domain (misalnya localhost atau domain aplikasi)
            false,            // Secure (hanya dikirim melalui HTTPS)
            true              // HttpOnly (tidak bisa diakses oleh JavaScript)
        );
    }


    // Logout user
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Logged out successfully']);
    }

    // Mendapatkan informasi user yang sedang login
    public function profile()
    {
        try {
            $user = auth()->user(); // Memastikan auth() dapat mengambil user
            return response()->json($user);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
