<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Token;
use Exception;
use App\Exceptions\myDBException;
use App\Http\Utils\TokenUtil;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // DB에러, 시스템에러, 토큰에러, 정보획득에러
    protected $tokenDI;

    public function __construct(TokenUtil $tokenUtil) {
        $this->tokenDI = $tokenUtil;
    }

    /**
     * 로그인 처리
     * 
     * @param  Illuminate\Http\Request $request 리퀘스트 객체
     * @return string json 액세스토큰, 쿠키httponly 리플래쉬토큰
    */
    public function login(Request $request) {
        // DB 유저정보 획득
        $userInfo = User::where('u_id', $request->u_id)
                    ->where('u_pw', $request->u_pw)
                    ->first();

        // 유저정보 NULL 확인
        if(is_null($userInfo)) {
            throw new Exception('E20');
        }

        // 토큰 생성
        list($accessToken, $refreshToken) = $this->tokenDI->createTokens($userInfo);

        // 리플래쉬 토큰 DB 저장
        $ext = Carbon::createFromTimestamp($this->tokenDI->getPayloadValueToKey($refreshToken,'ext'));
        try {
            DB::beginTransaction();
            Token::updateOrInsert(
                ['u_pk' => $this->tokenDI->getPayloadValueToKey($refreshToken,'upk')]
                ,[
                    't_rt' => $refreshToken
                    ,'t_ext' => $ext->format('Y-m-d H:i:s')
                ]
            );
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::debug($e->getMessage());
            throw new myDBException('E80');
        }
        
        // 리턴
        return response()->json([
            'access_token' => $accessToken
        ], 200)->cookie('refresh_token', $refreshToken, env('TOKEN_EXP_REFRESH'));

    }
}
