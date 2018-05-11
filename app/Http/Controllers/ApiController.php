<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;




class ApiController extends Controller
{
    //
    public $PARAMS;

    public function setParams() {

    }

    public function sendHttpMessage($api) {
        $curl = curl_init();
        $url = "https://carderla.co.kr/index.php/Car/getCar";
        $data = array(
            'test' => 'test'
        );

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, $data);
        $res = curl_exec($curl);
        var_dump($res);
        curl_close($curl);
    }


}