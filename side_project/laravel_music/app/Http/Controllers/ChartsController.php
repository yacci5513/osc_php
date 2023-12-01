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
            $openApiUrl = 'https://apis.naver.com/vibeWeb/musicapiweb/vibe/v1/chart/track/total';
            $response = Http::withoutVerifying()->get($openApiUrl);
            $responseBody = $response->body();
            $xml = simplexml_load_string($responseBody, NULL, LIBXML_NOCDATA );
            $jsonData = json_decode(json_encode($xml), true);

            $i=0;
            foreach ($jsonData["result"]["chart"]["items"]["tracks"]["track"] as $value) {
                if(isset($value["trackTitle"]) && isset($value["artists"]["artist"]["artistName"])) {
                    $data["track"][$i]["trackTitle"] = $value["trackTitle"];
                    $data["track"][$i]["artistName"] = $value["artists"]["artist"]["artistName"];
                    $i++;
                }
            }
            return response()->json($data);
        } catch (\Exception $e) {
            // HTTP 요청이 실패하면 예외 처리
            Log::error('HTTP 요청 실패: ' . $e->getMessage());
            return response()->json([
                'code' => 'E50'
            ], 404);
        }
    }

    public function sendMelonChart() {
        try {
            $openApiUrl = 'https://m2.melon.com/m6/chart/ent/songChartList.json?cpId=AS40&cpKey=14LNC3&appVer=6.5.8.1';
            $response = Http::withoutVerifying()->get($openApiUrl);
            $jsonData = $response->json();
            $i=0;
            foreach ($jsonData["response"]["SONGLIST"] as $value) {
                if(isset($value["SONGNAME"]) && isset($value["ARTISTLIST"][0]["ARTISTNAME"])) {
                    $data["track"][$i]["trackTitle"] = $value["SONGNAME"];
                    $data["track"][$i]["artistName"] = $value["ARTISTLIST"][0]["ARTISTNAME"];
                    $i++;
                }
            }
            return response()->json($data);
        } catch (\Exception $e) {
            // HTTP 요청이 실패하면 예외 처리
            return response()->json([
                'code' => 'E50'
            ], 404);
            Log::error('HTTP 요청 실패: ' . $e->getMessage());
        }
    }
}