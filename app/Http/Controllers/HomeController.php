<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $apiConfigTestimoni = Config::get("api." . app()->environment() . ".get_testi");

        $apiConfigService = Config::get("api." . app()->environment() . ".get_service");

        $apiConfigTreatment = Config::get("api." . app()->environment() . ".get_treatment");


        $resTestimoni = json_decode(file_get_contents($apiConfigTestimoni), true);
        $resService = json_decode(file_get_contents($apiConfigService), true);
        $resTreatment = json_decode(file_get_contents($apiConfigTreatment), true);


        return view('landing.index', ['resTestimoni' => $resTestimoni, 'resService' => $resService, 'resTreatment' => $resTreatment]);
    }

    public function confirmationPayment($id)
    {
        $apiConfigService = Config::get("api." . app()->environment() . ".get_service");
        $apiConfigTreatment = Config::get("api." . app()->environment() . ".get_treatment");
        $apiConfigBooking = Config::get("api." . app()->environment() . ".get_booking");

        $resService = json_decode(file_get_contents($apiConfigService), true);
        $resTreatment = json_decode(file_get_contents($apiConfigTreatment), true);
        $resBooking = json_decode(file_get_contents($apiConfigBooking), true);

        $selectedBooking = array_filter($resBooking['result'], function ($booking) use ($id) {
            return $booking['id'] == $id;
        });

        $selectedBooking = reset($selectedBooking);

        $selectedTreatment = array_filter($resTreatment['result'], function ($treatment) use ($selectedBooking) {
            return $treatment['id'] == $selectedBooking['treatment_id'];
        });

        $selectedService = array_filter($resService['result'], function ($service) use ($selectedBooking) {
            return $service['id'] == $selectedBooking['service_id'];
        });

        $selectedTreatment = reset($selectedTreatment);
        $selectedService = reset($selectedService);

        return view('payment.index', [
            'selectedBooking' => $selectedBooking,
            'selectedTreatment' => $selectedTreatment,
            'selectedService' => $selectedService,
        ]);
    }

    public function generate($trx_id)
    {
        $apiUrl = "https://api.sandbox.midtrans.com/v2/qris/{$trx_id}/qr-code";

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $qrCodeImage = $response->body();

            // Kirimkan gambar QR Code ke blade
            return view('generateqr.index', [
                'qrCodeImage' => $qrCodeImage,
            ]);
        } else {
            // Tangani kesalahan jika panggilan API tidak berhasil
            return response()->json(['error' => 'Failed to retrieve QR Code data'], $response->status());
        }
    }

}
