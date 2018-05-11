<?php
/**
 * Created by PhpStorm.
 * User: quadcore
 * Date: 2018. 5. 11.
 * Time: PM 1:44
 */

namespace App\Library;


class Anyalazum
{
    public function httpMethod($api) {
        switch ($api->method) {
            case 'POST' :
                $curlOpt = CURLOPT_POST;
                $name = 'POST';
                return array($curlOpt, $name);
                break;
            case 'GET' :
                $curlOpt = CURLOPT_HTTPGET;
                $name = 'GET';
                return array($curlOpt, $name);
                break;
            case 'DELETE' :
                $curlOpt = CURLOPT_DEL;
                $name = 'DELETE';
                return array($curlOpt, $name);
                break;
            case 'PUT' :
                $curlOpt = CURLOPT_PUT;
                $name = 'PUT';
                return array($curlOpt, $name);
                break;
            case 'PATCH' :
                $curlOpt = CURLOPT_CUSTOMREQUEST;
                $name = 'PATCH';
                return array($curlOpt, $name);
                break;

        }
    }
    //get방식에서 url ?뒤에 붙이는 함수
    public function getParameter($api) {

    }

}