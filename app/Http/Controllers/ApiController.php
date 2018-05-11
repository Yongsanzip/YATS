<?php

namespace App\Http\Controllers;

use App\Library\Anyalazum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class ApiController extends Controller
{
    //
    public $PARAMS;

    public function setParams() {

    }

    public function send() {
        $curl = curl_init();
//        $url = "https://carderla.co.kr/index.php/Car/getCar";

        $an = new Anyalazum();
//        $method = $an->httpMethod($api);

        $url = $_POST['url'];
        curl_setopt($curl, CURLOPT_URL, $url);
        $reponse = curl_exec($curl);
        echo $reponse;
        /*
        if ($method->name == 'GET') {
            $url = $api->url.'?'.http_build_query($api->params, '','&');
            curl_setopt($curl, CURLOPT_URL, $url);
            $res = curl_exec();
            var_dump($res);
            curl_close();
        } else {

        }*/
        //return $t = array($statusCode, $response);
    }

}