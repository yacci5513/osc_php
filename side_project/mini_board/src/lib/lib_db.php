<?php

    // ******************************
    // 파일명 : lib_db.php
    // 기능 : DB 관련 함수
    // 버전 : v001 new Oh.sc 230920
    // ******************************

    // ------------------------
    // 함수명 : db_conn
    // 기능 : DB connect
    // 파라미터 : PDO  &$conn
    // 리턴 : boolean
    // ------------------------
	function db_conn( &$conn ) { //reference 파라미터 = (&) 변수 주소값을 넘겨 받는다.
		$db_host = "localhost"; // host
		$db_user = "root"; //user
		$db_pw = "php504"; // password
		$db_name = "mini_board"; // DB name
		$db_charset = "utf8mb4"; // charset
		$db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
		
		try {
			$db_options = [
				// DB의 Prepared Statement 기능을 사용하도록 설정
				PDO::ATTR_EMULATE_PREPARES => false
				// PDO Exception을 Throws하도록 설정
				,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				// 연상배열로 Fetch를 하도록 설정
				,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			];
			//PDO Class로 DB연동
			$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
			return true;
			
		} catch (exception $e) {
			$conn = null;
			return false;
		}
	}

	// ------------------------
    // 함수명 : db_destroy_conn
    // 기능 : DB Destroy
    // 파라미터 : PDO  &$conn
    // 리턴 : 없음
    // ------------------------
    function db_destroy_conn( &$conn ) {
        $conn = null;
    }

	// ------------------------
    // 함수명 : db_select_boards_paging
    // 기능 : boards paging 조회
    // 파라미터 : PDO 	 &$conn
	//			 Array	&$arr_param 쿼리 작성용 배열
    // 리턴 : Array / false
    // ------------------------
	function db_select_boards_paging(&$conn, &$arr_param) {
		try {
			$sql = 
				" SELECT "
				."		b_id "
				."		,b_title "
				."		,b_create_at "
				." FROM "
				." 		boards "
				." WHERE "
				."		b_delete_flag = '0' "
				." ORDER BY "
				."		b_id DESC "
				." LIMIT :list_cnt OFFSET :offset "
			;

			$arr_ps = [
				":list_cnt" => $arr_param["list_cnt"]
				,":offset" => $arr_param["offset"]
			];

			$stmt = $conn->prepare($sql);
			$stmt->execute($arr_ps);
			$result = $stmt->fetchAll();
			return $result;
		} catch (exception $e) {
			echo $e->getMessage();
			return false;
		}
	}

	// ------------------------
    // 함수명 : db_select_boards_cnt
    // 기능 : boards count 조회
    // 파라미터 : PDO  &$conn
    // 리턴 : int / false
    // ------------------------
	function db_select_boards_cnt(&$conn) {
		try {
			$sql = 
				" SELECT "
				."		COUNT(b_id) as cnt "
				." FROM "
				." 		boards "
				." WHERE "
				." 		b_delete_flag = '0' "
			;

			$arr_ps = [];

			$stmt = $conn->query($sql);
			$result = $stmt->fetchAll();
			return (int)$result[0]["cnt"];
		} catch (exception $e) {
			echo $e->getMessage();
			return false;
		}
	}

	// ------------------------
    // 함수명 : db_insert_boards
    // 기능 : boards 데이터 추가
    // 파라미터 : PDO 	 &$conn
	//			 Array	&$arr_param 쿼리 작성용 배열
    // 리턴 : Boolean
    // ------------------------
	function db_insert_boards(&$conn, &$arr_param) {
			$sql = 
				" INSERT INTO boards( "
				."		b_title "
				."		,b_content "
				."		) "
				." VALUES( "
				."		:b_title "
				." 		,:b_content "
				." ) "
			;

			$arr_ps = [
				":b_title" => $arr_param["title"]
				,":b_content" => $arr_param["content"]
			];
		try {
			$stmt = $conn->prepare($sql);
			$result = $stmt->execute($arr_ps);
			return $result;
		} catch (exception $e) {
			echo $e->getMessage();
			return false;
		}
	}

	// ------------------------
    // 함수명 : db_select_boards_id
    // 기능 : id를 통한 제목, 내용 출력
    // 파라미터 : PDO 	 &$conn
	//			Array	&$arr_param
    // 리턴 : Array / False
    // ------------------------
	function db_select_boards_id(&$conn, &$arr_param) {
		try {
			$sql = 
				" SELECT "
				."		b_id "
				."		,b_title "
				."		,b_content "
				."		,b_create_at "
				." FROM "
				." 		boards "
				." WHERE "
				."		b_id = :b_id "
				." 		AND "
				." 		b_delete_flag = '0' "
			;

			$arr_ps = [
				":b_id" => $arr_param["b_id"]
			];

			$stmt = $conn->prepare($sql);
			$stmt->execute($arr_ps);
			$result = $stmt->fetchAll();
			return $result;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}

	// ------------------------
    // 함수명 : db_update_boards_id
    // 기능 : boards 레코드 수정
    // 파라미터 : PDO 	 &$conn
	//			Array	&$arr_param
    // 리턴 : Boolean
    // ------------------------
	function db_update_boards_id(&$conn, &$arr_param) {
		try {
			$sql = 
			" UPDATE boards "
			." SET "
			."		b_title=:b_title "
			."		,b_content=:b_content "
			." WHERE "
			."		b_id=:b_id "
			;

			$arr_ps = [
				":b_id" => $arr_param["b_id"]
				,":b_title" => $arr_param["b_title"]
				,":b_content" => $arr_param["b_content"]
			];
			
			$stmt = $conn->prepare($sql);
			$result = $stmt->execute($arr_ps);
			return $result;
		} catch (Exception $e) {
			echo $e->getMessage();
			return false;
		}
	}

	// ------------------------
    // 함수명 : db_delete_boards_id
    // 기능 : boards 레코드 수정
    // 파라미터 : PDO 	 &$conn
	//			Array	&$arr_param
    // 리턴 : Boolean
    // ------------------------
	function db_delete_boards_id(&$conn, &$arr_param) {
		try {
			$sql = 
			" UPDATE boards "
			." SET "
			."		b_delete_at = now() "
			."		,b_delete_flag = '1' "
			." WHERE "
			."		b_id=:b_id "
			;

			$arr_ps = [
				":b_id" => $arr_param["b_id"]
			];
			
			// 2. Query 실행
			$stmt = $conn->prepare($sql);
			$result = $stmt->execute($arr_ps);
			return $result; //정상 종료: true 리턴
		} catch (Exception $e) {
			echo $e->getMessage();
			return false; // 예외발생 false리턴
		}
	}
?>
