<?php

namespace lib;

class Validation {
	private static $arrErrorMsg = [];
	
	public static function getArrErrorMsg() {
		return self::$arrErrorMsg;
	}

	public static function setArrErrorMsg($msg) {
		self::$arrErrorMsg[] = $msg;
	}

	public static function userChk(array $inputData) : bool {
		$patternId = "/^[a-zA-Z0-9]{8,20}$/";
		$patternPw = "/^[a-zA-Z0-9!@]{8,20}$/";
		$patternName = "/^[a-zA-Z가-힣]{2,20}$/u";

		if(array_key_exists("u_id", $inputData)) {
			if(preg_match($patternId, $inputData["u_id"], $match) === 0) {
				// ID 에러 처리
				$msg = "ID는 (영어대소문자+숫자)로 8~20자 입력해주세요.";
				self::setArrErrorMsg($msg);
			}
		}

		if(array_key_exists("u_pw", $inputData)) {
			if(preg_match($patternPw, $inputData["u_pw"], $match) === 0) {
				// PW 에러 처리
				$msg = "PW는 (영어대소문자+숫자+!+@)로 8~20자 입력해주세요.";
				self::setArrErrorMsg($msg);
			}
		}

		if(array_key_exists("u_pw_chk", $inputData)) {
			if($inputData["u_pw"] !== $inputData["u_pw_chk"]) {
				// PW , PW_CHK 에러 처리
				$msg = "비밀번호와 비밀번호 확인이 서로 다릅니다.";
				self::setArrErrorMsg($msg);
			}
		}

		if(array_key_exists("u_name", $inputData)) {
			if(preg_match($patternName,$inputData["u_name"], $match) === 0) {
				// NAME 에러 처리
				$msg = "이름은 (영어대소문자+한글)로 2~50자 입력해주세요.";
				self::setArrErrorMsg($msg);
			}
		}
		
		//리턴 처리
		if( count(self::$arrErrorMsg) > 0 ) {
			return false;
		}
		return true;
	}
}