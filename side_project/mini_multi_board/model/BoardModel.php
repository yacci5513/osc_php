<?php

namespace model;

class BoardModel extends ParentsModel {
	// 
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
			." 		b_type=:b_type "
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
			$result = $stmt->execute($prepare);
			return $result;
		} catch (Exception $e) {
			echo "BoardModel->insertBoardList Error : ".$e->getMessage();
			exit();
		}
	}

	//디테일 조회
	public function getBoardDetail($arrBoardDetailInfo) {
		$sql =
		" SELECT "
		." 		u.u_name "
		." 		,b.id "
		." 		,b.u_pk "
		." 		,b.b_type "
		." 		,b.b_title "
		." 		,b.b_content "
		." 		,b.b_img "
		." 		,b.create_at "
		." 		,b.update_at "
		." FROM  board as b "
		." 		JOIN  user as u "
		." 		ON b.u_pk = u.id "
		." WHERE "
		." 		b.id= :id "
		;
		
		$prepare = [
			":id" => $arrBoardDetailInfo["id"]
		];
		
		try {
			$stmt = $this->conn->prepare($sql);
			$stmt->execute($prepare);
			$result = $stmt->fetchAll();
			return $result;
		} catch (Exception $e) {
			echo "BoardModel->getBoardDetail Error : ".$e->getMessage();
			exit();
		}
	}

	//디테일 조회
	public function DeleteBoardList($arrBoardDeleteInfo) {
		$sql =
		" UPDATE board "
		."		SET "
		." 		delete_at=NOW() "
		." WHERE "
		." 		id= :id "
		." 		AND "
		." 		u_pk= :u_pk "
		;
	
		$prepare = [
			":id" => $arrBoardDeleteInfo["id"]
			,":u_pk" => $arrBoardDeleteInfo["u_pk"]
		];
		
		try {
			$stmt = $this->conn->prepare($sql);
			$result = $stmt->execute($prepare);
			return $result;
		} catch (Exception $e) {
			echo "BoardModel->DeleteBoardList Error : ".$e->getMessage();
			exit();
		}
	}
}