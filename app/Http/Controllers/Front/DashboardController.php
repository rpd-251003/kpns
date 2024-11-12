<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil token dari cookie
        $token = $_COOKIE['token'];


        if (!$token) {
            return redirect()->route('login')->withErrors(['msg' => 'Token tidak ditemukan, silakan login kembali.']);
        }

        // API URL
        $url = url('http://127.0.0.1:8000/api/profile');

        try {
            $response = Http::withToken($token)->timeout(5)->get($url);

            if ($response->failed()) {
                return redirect()->route('login')->withErrors(['msg' => 'Gagal mengambil data profil. Silakan login kembali.']);
            }

            $user = $response->json();

            // dd($token);

            // if ($user['name'] == null) {
            //     return redirect()->route('login')->withErrors(['msg' => 'Gagal mengambil data profil. Silakan login kembali.']);
            // }

            return view('user.dashboard', compact('user'));
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['msg' => 'Terjadi kesalahan, silakan coba lagi.']);
        }
    }
}
