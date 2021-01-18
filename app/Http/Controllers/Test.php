<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Test extends Controller
{
    public function index()
    {
        // $url = 'https://www.rti-investor.co.id/dewa/last.jsp';
        // $sxml = file_get_contents($url);
        // //$sxml = $this->curl_get_contents($url);
        // echo $sxml;

        $response = Http::get('http://investor.rti.co.id/dewa/last.jsp', );

        $xml = simplexml_load_string($response->body());
        $json = json_encode($xml);
        $array = json_decode($json);

        dd($array);


    }

    function curl_get_contents($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
