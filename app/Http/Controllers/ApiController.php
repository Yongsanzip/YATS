<?php
namespace App\Http\Controllers;

use App\Library\Anyalazum;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ApiController extends Controller
{
    //
    public $PARAMS;

    public function send() {
        $an = new Anyalazum();
        $url = Input::get('url');
        $method = Input::get('method');

        $headers = json_decode(Input::get('headers'), true);
        $header = array();
        if (is_array($headers)) {
            foreach ($headers as $key => $value) {
                $header = $an->array_push_assoc($header, $key, $value->key.":".$value->data);
            }
        }

        $body = json_decode(Input::get('datas'), true);
        $fileDatas = array();
        $datas = array();

        if (is_array($body)) {
            foreach ($body as $key => $value) {
                if ($value['data_type'] === 'file') {
                    $fileDatas = $an->array_push_assoc($fileDatas, $value['key'], $_FILES['video']['tmp_name']);
                } else {
                    $datas = $an->array_push_assoc($datas, $value['key'], $value['data']);
                }
            }
        }
        //$datas  = $an->array_push_assoc($datas,'video',$_FILES['video']);

        $response = '';
        $responseCode = '';
        $curl = curl_init();
        switch ($method) {
            case 'GET' :
                $datas = rawurldecode(http_build_query($datas));
                $url = $url.'?'.$datas;
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array("content-type::multipart/form-data"));
                curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
                curl_setopt($curl, CURLOPT_HTTPGET, true);
                $response = curl_exec($curl);
                $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                curl_close($curl);

                break;
            case 'POST' :
                foreach ($fileDatas as $key => $value) {
                    $datas = $an->array_push_assoc($datas, $key,
                        new \CURLFile($_FILES[$key]['tmp_name'], $_FILES[$key]['type'], $_FILES[$key]['name'])
                    );
                }

                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $datas);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
                curl_setopt($curl, CURLOPT_POST, true);
                $response = curl_exec($curl);
                echo $response;
                curl_close($curl);
                break;
            case 'PUT' :
                foreach ($fileDatas as $key => $value) {
                    $datas = $an->array_push_assoc($datas, $key,
                        new \CURLFile($_FILES[$key]['tmp_name'], $_FILES[$key]['type'], $_FILES[$key]['name'])
                    );
                }

                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $datas);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                $response = curl_exec($curl);
                $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                curl_close($curl);
                break;
            case  'DELETE' :
                foreach ($fileDatas as $key => $value) {
                    $datas = $an->array_push_assoc($datas, $key,
                        new \CURLFile($_FILES[$key]['tmp_name'], $_FILES[$key]['type'], $_FILES[$key]['name'])
                    );
                }

                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $datas);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                $response = curl_exec($curl);
                $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                curl_close($curl);
                break;
            case 'PATCH' :
                foreach ($fileDatas as $key => $value) {
                    $datas = $an->array_push_assoc($datas, $key,
                        new \CURLFile($_FILES[$key]['tmp_name'], $_FILES[$key]['type'], $_FILES[$key]['name'])
                    );
                }

                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $datas);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");

                $response = curl_exec($curl);
                $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                curl_close($curl);
                break;

            default :
                return view('error');
                break;
        }
//*/
    }

}