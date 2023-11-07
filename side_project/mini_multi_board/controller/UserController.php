<?php

namespace controller;

use model\UserModel;

class UserController extends ParentsController {
	// 로그인 페이지 이동
	protected function loginGet() {
		return "view/login"._EXTENSION_PHP;
	}

	// 회원가입 페이지 이동
	protected function registGet() {
		return "view/regist"._EXTENSION_PHP;
	}

	// 회원가입 처리
	protected function registPost() {
		$u_id = $_POST["u_id"];
		$u_pw = $_POST["u_pw"];
		$u_pw_chk = $_POST["u_pw_chk"];
		$u_name = $_POST["u_name"];
		$arrAddUserInfo = [
			"u_id" => $u_id
			,"u_pw" => $this->encryptionPassword($_POST["u_pw"])
			,"u_name" => $u_name
		];

		$patternId = "/^[a-zA-Z0-9]{8,20}$/";
		$patternPw = "/^[a-zA-Z0-9!@]{8,20}$/";
		$patternName = "/^[a-zA-Z가-힣]{2,20}$/u";

		if(preg_match($patternId, $u_id, $match) === 0) {
			// ID 에러 처리
			$this ->arrErrorMsg[] = "ID는 (영어대소문자+숫자)로 8~20자로 입력해주세요.";
		};
		if(preg_match($patternPw, $u_pw, $match) === 0) {
			// PW 에러 처리
			$this ->arrErrorMsg[] = "PW는 (영어대소문자+숫자+!+@)로 8~20자로 입력해주세요.";
		};
		if(preg_match($patternName, $u_name, $match) === 0) {
			// NAME 에러 처리
			$this ->arrErrorMsg[] = "이름은 (영어대소문자+한글)로 2~50자로 입력해주세요.";
		};
		
		// 아이디 중복 체크
		if($u_pw !== $u_pw_chk) {
			$this ->arrErrorMsg[] = "비밀번호와 비밀번호 확인이 서로 다릅니다.";
		}

		// 유효성 체크 미통과시
		if(count($this->arrErrorMsg) > 0) {
			return "view/regist"._EXTENSION_PHP;
			exit();
		}

		// 인서트 처리
		$userModel = new UserModel();
		$userModel->beginTransaction();
		$result = $userModel->addUserInfo($arrAddUserInfo);
		if ( $result !== true ) {
			$userModel->rollBack();
		} else {
			$userModel->commit();
		}
		$userModel->destroy();
		return "Location: /user/login";
	}

	// 로그인 처리
	protected function loginPost() {
		//ID, PW 설정(DB에서 사용할 데이터 가공)
		$arrInput= [];
		$arrInput["u_id"]= $_POST["u_id"];
		$arrInput["u_pw"]= $this->encryptionPassword($_POST["u_pw"]);

		$modelUser = new UserModel();
		$resultUserInfo = $modelUser->getUserInfo($arrInput, true);

		//유저 유무 체크
		if(count($resultUserInfo) === 0) {
			$this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";
			return "view/login"._EXTENSION_PHP;
		}

		//세션에 u_id 정의
		$_SESSION["u_pk"] = $resultUserInfo[0]["id"];
		$_SESSION["u_id"] = $resultUserInfo[0]["u_id"];
		return "Location: /board/list?b_type=0";
	}

	protected function logoutGet() {
		session_unset();
		session_destroy();
		return "Location: /user/login";
	}


	//비밀번호 암호화
	private function encryptionPassword($pw) {
		return base64_encode($pw);
	}
}

