<?php
namespace App\Http\Utils;

use App\Models\User;
use App\Http\Utils\EncrypUtil;
use Exception;

class TokenUtil {
	/**
     * 토큰 생성
     *
     */
	public function createTokens(User $userInfo) {
		$accessToken = $this->createToken($userInfo, env('TOKEN_EXP_ACCESS'));
		$refreshToken = $this->createToken($userInfo, env('TOKEN_EXP_REFRESH'));

		return [$accessToken,$refreshToken];
	}

	public function createToken(User $userInfo, int $ttl) {
		$header = $this->makeTokenHeader();
		$payload = $this->makeTokenPayload($userInfo, $ttl);
		$signature = $this->makeTokenSignature($header, $payload);
		return $header.'.'.$payload.'.'.$signature;
	}

	protected function makeTokenHeader() {
		$arr= [
			'alg' => env('TOKEN_ALG')
			,'typ' => env('TOKEN_TYP')
		];

		return EncrypUtil::base64UrlEncode(json_encode($arr));
	}

	protected function makeTokenPayload(User $userInfo, int $ttl) {
		$now = time();
		$arr= [
			'upk' => $userInfo->u_pk
			,'u_name' => $userInfo->u_name
			,'iat' => $now
			,'ttl' => $ttl
			,'ext' => $now+$ttl
		];

		return EncrypUtil::base64UrlEncode(json_encode($arr));
	}

	protected function makeTokenSignature(string $header, string $payload) {
		return EncrypUtil::hashWithSalt(env('TOKEN_ALG'), $header.'.'.$payload.env('TOKEN_SECRET_KEY'), env('TOKEN_SOLT_LENGTH'));
	}

	// 토큰 분리
	public function explodeToken($token) {
		$arrToken = explode('.', $token);
		return [$arrToken[0], $arrToken[1], $arrToken[2]];
	}

	// 토큰에서 페이로드의 특정 키의 값을 리턴
	public function getPayloadValueToKey(string $token, string $key) {
		list($header, $payload, $signature) = $this->explodeToken($token);
		$payloadDecoded = json_decode(EncrypUtil::base64UrlDecode($payload));

		if(is_null($payloadDecoded) || !isset($payloadDecoded->$key)) {
            throw new Exception('E05');
        }

		return $payloadDecoded->$key;
	}
}