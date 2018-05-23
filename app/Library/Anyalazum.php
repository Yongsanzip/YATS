<?php
/**
 * Created by PhpStorm.
 * User: quadcore
 * Date: 2018. 5. 11.
 * Time: PM 1:44
 */

namespace App\Library;
//

class Anyalazum
{

    public function httpMethod($api) {
        $params = json_decode("{key: \"뭐시기\", data: \"892045rd98b\", data_type: \"text\"},
                        {key: \"뭐시기\", data: \"892045rd98b\", data_type: \"file\"}");
        var_dump($params);


    }
    //연관배열에 값 추가하는 함수
    public function array_push_assoc($arr, $key, $value) {
        if (is_array($arr)) {
            $arr[$key] = $value;
            return $arr;
        }

    }

}