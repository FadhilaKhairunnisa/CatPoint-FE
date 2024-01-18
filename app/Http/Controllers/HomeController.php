<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    // Menampilkan halaman utama dengan data testimoni, layanan, dan perawatan
    public function index()
    {
        // Mendapatkan konfigurasi API untuk testimoni
        $apiConfigTestimoni = Config::get("api." . app()->environment() . ".get_testi");

        // Mendapatkan konfigurasi API untuk layanan
        $apiConfigService = Config::get("api." . app()->environment() . ".get_service");

        // Mendapatkan konfigurasi API untuk perawatan
        $apiConfigTreatment = Config::get("api." . app()->environment() . ".get_treatment");

        // Mendapatkan data testimoni dari API
        $resTestimoni = json_decode(file_get_contents($apiConfigTestimoni), true);

        // Mendapatkan data layanan dari API
        $resService = json_decode(file_get_contents($apiConfigService), true);

        // Mendapatkan data perawatan dari API
        $resTreatment = json_decode(file_get_contents($apiConfigTreatment), true);

        // Menampilkan halaman utama dengan data testimoni, layanan, dan perawatan
        return view('landing.index', ['resTestimoni' => $resTestimoni, 'resService' => $resService, 'resTreatment' => $resTreatment]);
    }

    // Konfirmasi pembayaran dengan menampilkan detail layanan dan perawatan yang dipilih
    public function confirmationPayment($id)
    {
        // Mendapatkan konfigurasi API untuk layanan
        $apiConfigService = Config::get("api." . app()->environment() . ".get_service");

        // Mendapatkan konfigurasi API untuk perawatan
        $apiConfigTreatment = Config::get("api." . app()->environment() . ".get_treatment");

        // Mendapatkan konfigurasi API untuk pemesanan
        $apiConfigBooking = Config::get("api." . app()->environment() . ".get_booking");

        // Mendapatkan data layanan dari API
        $resService = json_decode(file_get_contents($apiConfigService), true);

        // Mendapatkan data perawatan dari API
        $resTreatment = json_decode(file_get_contents($apiConfigTreatment), true);

        // Mendapatkan data pemesanan dari API
        $resBooking = json_decode(file_get_contents($apiConfigBooking), true);

        // Memfilter pemesanan berdasarkan ID yang dipilih
        $selectedBooking = array_filter($resBooking['result'], function ($booking) use ($id) {
            return $booking['id'] == $id;
        });

        // Mengambil pemesanan yang dipilih
        $selectedBooking = reset($selectedBooking);

        // Memfilter perawatan berdasarkan pemesanan yang dipilih
        $selectedTreatment = array_filter($resTreatment['result'], function ($treatment) use ($selectedBooking) {
            return $treatment['id'] == $selectedBooking['treatment_id'];
        });

        // Memfilter layanan berdasarkan pemesanan yang dipilih
        $selectedService = array_filter($resService['result'], function ($service) use ($selectedBooking) {
            return $service['id'] == $selectedBooking['service_id'];
        });

        // Mengambil perawatan yang dipilih
        $selectedTreatment = reset($selectedTreatment);

        // Mengambil layanan yang dipilih
        $selectedService = reset($selectedService);

        // Menampilkan halaman konfirmasi pembayaran dengan detail layanan dan perawatan yang dipilih
        return view('payment.index', [
            'selectedBooking' => $selectedBooking,
            'selectedTreatment' => $selectedTreatment,
            'selectedService' => $selectedService,
        ]);
    }

    // Menghasilkan gambar QR Code berdasarkan ID transaksi
    public function generate($trx_id)
    {
        // URL API untuk mendapatkan gambar QR Code
        $apiUrl = "https://api.sandbox.midtrans.com/v2/qris/{$trx_id}/qr-code";

        // Mendapatkan respons dari API untuk gambar QR Code
        $response = Http::get($apiUrl);

        // Jika respons berhasil, tampilkan gambar QR Code
        if ($response->successful()) {
            $qrCodeImage = $response->body();

            // Kirimkan gambar QR Code ke blade
            return view('generateqr.index', [
                'qrCodeImage' => $qrCodeImage,
            ]);
        } else {
            // Tangani kesalahan jika panggilan API tidak berhasil
            return response()->json(['error' => 'Gagal mendapatkan data QR Code'], $response->status());
        }
    }
}


