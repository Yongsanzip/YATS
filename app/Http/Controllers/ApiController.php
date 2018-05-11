<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use HttpMessage;



class ApiController extends Controller
{
    //
    public $PARAMS;

    public function setParams() {

    }

    public function sendHttpMessage($params) {
        $message = new \HttpMessage();
        /*
        //파라미터들의 position의 값에 따라 헤더, 바디로 넣는다.
        foreach ($params as $param) {
            switch ($param->position) {
                case 'header' :
                    $message->setHeaders();
                    break;

                case 'body' :
                    $message->setBody();
                    break;
            }
        }
        */
        $message->setRequestUrl($params['url']);
        return $message->getRequestUrl();
        //return $message->getResponseCode();
    }
}