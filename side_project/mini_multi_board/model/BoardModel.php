<?php

namespace model;

class BoardModel extends ParentsModel {
	// 특정 유저를 조회하는 메소드
	public function getBoardList($arrBoardInfo) {
		$sql =
			" SELECT "
			." 		id "
			." 		,u_pk "
			." 		,b_title "
			." 		,b_content "
			." 		,b_img "
			." 		,create_at "
			." 		,update_at "
			." FROM  board "
			." WHERE "
			." b_type=:b_type "
			." AND delete_at IS NULL"
			;
		
		$prepare = [
			":b_type" => $arrBoardInfo["b_type"]
		];
		
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->fetchAll();
			return $result;
		} catch (Exception $e) {
			echo "BoardModel->getBoardList Error : ".$e->getMessage();
			exit();
		}
	}


		// 글 삽입
		public function insertBoardList($arrBoardInfo) {
			$sql =
				" INSERT INTO board( "
				." 		u_pk "
				." 		,b_type "
				." 		,b_title "
				." 		,b_content "
				." 		,b_img "
				." 		) "
				." VALUES( "
				." 		:u_pk "
				." 		,:b_type "
				." 		,:b_title "
				." 		,:b_content "
				." 		,:b_img "
				." 		) "
				;

			$prepare = [
				":u_pk" => $arrBoardInfo["u_pk"]
				,":b_type" => $arrBoardInfo["b_type"]
				,":b_title" => $arrBoardInfo["b_title"]
				,":b_content" => $arrBoardInfo["b_content"]
				,":b_img" => $arrBoardInfo["b_img"]
			];
			
			try {
				$stmt = $this->conn->prepare($sql);
				$stmt->execute($prepare);
				$result = $stmt->fetchAll();
				return $result;
			} catch (Exception $e) {
				echo "BoardModel->insertBoardList Error : ".$e->getMessage();
				exit();
			}
		}
}