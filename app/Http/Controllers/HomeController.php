<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

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



        // dd($resTestimoni);

        

        return view('landing.index', ['resTestimoni' => $resTestimoni, 'resService' => $resService, 'resTreatment' => $resTreatment]);
    }

}
