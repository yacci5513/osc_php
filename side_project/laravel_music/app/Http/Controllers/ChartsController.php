<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//추가
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\XML;
use Exception;


class ChartsController extends Controller
{
    public function sendMusixMatchChart() {
        try {
            $openApiUrl = 'http://api.musixmatch.com/ws/1.1/chart.artists.get?page=1&page_size=10&country=82&apikey=1df51a7ed2ca08c44fe30974dab011b8';
            $response = Http::get($openApiUrl);
            $responseData = $response->json();
            return response()->json($responseData);
        } catch (\Exception $e) {
            // HTTP 요청이 실패하면 예외 처리
            return response()->json([
                'code' => 'E50'
            ], 404);
            Log::error('HTTP 요청 실패: ' . $e->getMessage());
        }
    }

    public function sendVibeChart() {
        try {
            // $openApiUrl = 'https://apis.naver.com/vibeWeb/musicapiweb/vibe/v1/chart/track/total';
            // $removeCdataUrl = preg_replace('/<!\[CDATA\[(.*?)\]\]>/s', '$1', $openApiUrl);
            // $response = Http::withoutVerifying()->get($openApiUrl);
            // $xml = simplexml_load_string($response);
            // $json = json_decode(json_encode($xml), true);
            // Log::debug("지금log3", $json);
            $openApiUrl = 'https://apis.naver.com/vibeWeb/musicapiweb/vibe/v1/chart/track/total';
            $response = Http::withoutVerifying()->get($openApiUrl);
            // $removeCdataResponse = preg_replace('/<!\[CDATA\[(.*?)\]\]>/s', '$1', $response);
            $str = str_replace('<![CDATA[', '', $response);
            $str = str_replace(']]>', '', $str);
            $xml = simplexml_load_string($str);
            $json = json_decode(json_encode($xml), true);
            Log::debug($json);
            // $i = 0;
            // Log::debug("시작*********************************************************");
            // foreach ($json["result"]["chart"]["items"]["tracks"]["track"] as $value) {
            //     Log::debug("123455*********************************************************");
            //     Log::debug($value["artists"]);
            //     Log::debug("123455*********************************************************");
                // $data[$i]["artistName"] = $value["artists"]["artist"]["artistName"];
            //     $i++;
            // }
            // Log::debug("지금log3");
            // Log::debug($data);
            // $responseData = json_encode($response, true);
            return $response;
        } catch (\Exception $e) {
            // HTTP 요청이 실패하면 예외 처리
            Log::error('HTTP 요청 실패: ' . $e->getMessage());
            return response()->json([
                'code' => 'E50'
            ], 404);
        }
    }
}
