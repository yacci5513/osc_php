<?php

namespace controller;

use model\UserModel;
use lib\Validation;

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

		$arrAddUserInfo = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $this->encryptionPassword($_POST["u_pw"])
			,"u_name" => $_POST["u_name"]
		];

		$inputData = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $_POST["u_pw"]
			,"u_pw_chk" => $_POST["u_pw_chk"]
			,"u_name" => $_POST["u_name"]
		];
		// 유효성 체크 미통과시
		if(!Validation::userChk($inputData)) {
			$this->arrErrorMsg = Validation::getArrErrorMsg();
			return "view/regist"._EXTENSION_PHP;
		}

		// TODO : 아이디 중복 회원가입 방지 필요 ~

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
		$inputData = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $_POST["u_pw"]
		];
		if(!Validation::userChk($inputData)) {
			$this->arrErrorMsg = Validation::getArrErrorMsg();
			return "view/login"._EXTENSION_PHP;
		}
		
		//ID, PW 설정(DB에서 사용할 데이터 가공)
		$arrInput= [];
		$arrInput["u_id"]= $_POST["u_id"];
		$arrInput["u_pw"]= $this->encryptionPassword($_POST["u_pw"]);

		$modelUser = new UserModel();
		$resultUserInfo = $modelUser->getUserInfo($arrInput, true);
		
		//유저 유무 체크

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


	protected function registIDcheckGet() {
		$u_id = $_GET["u_id"];
		$arrchkError = "";
		$errorFlg="0";

		$arrcheckID = [
			"u_id" => $u_id
		];

		$userModel = new UserModel();
		$result = $userModel->checkID($arrcheckID);
		$userModel->destroy();
		// if ($result["u_cnt"] === 1) {
		// 	$resultCnt = True;
		// } else {
		// 	$resultCnt = False;
		// }
		// 유효성 체크 미통과시
		if(!Validation::userChk($arrcheckID)) {
			$errorFlg="1";
			$arrchkError = Validation::getArrErrorMsg()[0];
		}

		//TODO: 여기 다름 고치셈
		//

		//레스폰스 데이터 작성
		$arrTmp = [
			"errflg" => $errorFlg
			,"msg" => ""
			,"data" => $result["u_cnt"]
			,"val" => $arrchkError
		];

		$response = json_encode($arrTmp);
		//response 처리
		header('Content-type: application/json');
		echo $response;
		exit();
	}
}

