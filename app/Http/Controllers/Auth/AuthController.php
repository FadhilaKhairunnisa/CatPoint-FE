<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login');
    }

    public function indexRegister()
    {
        return view('auth.register');
    }


    public function loginProcess(Request $request)
    {

        // Kirim request login ke backend
        $response = Http::post('http://149.129.244.179/api/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        // Cek keberhasilan login dari respons backend
        if ($response->successful()) {
            
            $data = $response->json();

            // Menyimpan token di cookie
            $token = $data['token'];
            $minutes = 60 * 24; // Misalnya, cookie berlaku selama 1 hari

            return response()->json($data)->cookie('token', $token, $minutes);
        } else {
            // Tanggapan error jika login gagal
            return response()->json(['message' => 'Login failed'], $response->status());
        }
    }
}
