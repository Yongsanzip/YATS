<?php

namespace Tests\Feature;

use App\Api;
use App\Http\Controllers\ApiController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use HttpMessage;



class apiControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testsendHttpMessage()
    {
        $t = new ApiController();
        $test = array(
            'url' => 'https://carderla.co.kr/index.php/Car/getCar',
            //'position' => 'body',
            'key' => 'test',
            'value' => 'test'
        );
        $test2 = array(
            'url' => 'https://carderla.co.kr/index.php/Car/getCar',
            //'position' => 'body',
            'key' => 'test',
            'value' => 'test'
        );

        $this->assertSame($t->sendHttpMessage($test2), $t->sendHttpMessage($test));
        print $t->sendHttpMessage($test2);

    }
}