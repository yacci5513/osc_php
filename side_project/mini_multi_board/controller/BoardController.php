<?php

namespace controller;

use model\BoardModel;

class BoardController extends ParentsController {
	protected $arrBoardInfo;
	protected $titleBoardName;
	protected $boardType;
	protected $arrlistInput;

	// 게시판 리스트 페이지 이동
	protected function listGet() {

		$b_type = isset($_GET["b_type"]) ? $_GET["b_type"] : "0";

		$arrBoardInfo = [
			"b_type" => $b_type
		];

		// 페이지의 제목,타입 셋팅
		foreach($this->arrBoardNameInfo as $item) {
			if($item["b_type"] === $b_type) {
				$this->titleBoardName = $item["bn_name"];
				$this->boardType = $item["b_type"];
				break;
			}
		}

		//모델 인스턴스
		$boardModel = new BoardModel();
		$this ->arrBoardInfo = $boardModel->getBoardList($arrBoardInfo); 
		$boardModel->destroy();
		return "view/list"._EXTENSION_PHP;
	}

	//글 작성
	protected function addPost() {

		$u_pk = $_SESSION["u_pk"];
		$b_type = $_POST["b_type"];
		$b_title = $_POST["b_title"];
		$b_content = $_POST["b_content"];
		$b_img = $_FILES["b_img"]["name"];

		move_uploaded_file($_FILES["b_img"]["tmp_name"], _PATH_USERIMG.$b_img);

		$arrBoardInfo = [
			"u_pk" => $u_pk
			,"b_type" => $b_type
			,"b_title" => $b_title
			,"b_content" => $b_content
			,"b_img" => $b_img
		];
		
		//모델 인스턴스
		$boardModel = new BoardModel();
		$boardModel->beginTransaction();
		$this -> arrlistInput = $boardModel->insertBoardList($arrBoardInfo);
		if($result !== true) {
			$boardModel->rollBack();
			//에러 메시지 표시해줘야함 원래
		} else {
			$boardModel->commit();
		}
		$boardModel->destroy();
		return "Location: /board/list?b_type=$b_type";
	}
}