<?php
namespace App\Http\Utils;

use App\Models\User;
use App\Http\Utils\EncrypUtil;
use Exception;
use Carbon\Carbon;
use App\Models\Token;
use App\Exceptions\myDBException;
use Illuminate\Support\Facades\DB;
use App\Http\Utils\TokenUtil;

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
		return EncrypUtil::hashWithSalt(env('TOKEN_ALG'), $header.'.'.$payload.env('TOKEN_SECRET_KEY'), env('TOKEN_SALT_LENGTH'));
	}

	// 토큰 분리 메서드
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

	// 토큰 체크 메서드
	public function chkToken(string|null $token) {
		// 토큰 존재 유무
		if(empty($token)) {
			throw new Exception('E01');
		}

		list($header, $payload, $signature) = $this->explodeToken($token);

		// 시그니처 체크
		if(EncrypUtil::subStrSalt($signature, env('TOKEN_SALT_LENGTH'))
			!== EncrypUtil::subStrSalt($this->makeTokenSignature($header, $payload), env('TOKEN_SALT_LENGTH'))) {
				throw new Exception('E03');
		}

		// 유효시간 체크
		if($this->getPayloadValueToKey($token, 'ext') < time()) {
			throw new Exception('E02');
		}
	}

	// 리플래쉬 토큰 DB 저장
	public function upsertRefreshToken(string $refreshToken) {
		$ext = Carbon::createFromTimestamp($this->getPayloadValueToKey($refreshToken,'ext'));
		try {
			DB::beginTransaction();
			Token::updateOrInsert(
				['u_pk' => $this->getPayloadValueToKey($refreshToken,'upk')]
				,[
					't_rt' => $refreshToken
					,'t_ext' => $ext->format('Y-m-d H:i:s')
				]
			);
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			Log::error("리플래시 토큰 저장 에러".$e->getMessage());
			throw new myDBException('E80');
		}
		return true;
	}
}