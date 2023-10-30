<?php

    // ------------------------
    // 함수명 : db_conn
    // 기능 : DB connect
    // 파라미터 : PDO  &$conn
    // 리턴 : boolean
    // ------------------------
	function db_conn( &$conn ) {
		$db_host = "localhost";
		$db_user = "root";
		$db_pw = "php504";
		$db_name = "mini_board2";
		$db_charset = "utf8mb4";
		$db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
		
		try {
			$db_options = [
				PDO::ATTR_EMULATE_PREPARES => false
				,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			];
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
    // 함수명 : db_select_board2
    // 기능 : board2 전체 조회
    // 파라미터 : PDO 	 &$conn
	//			 Array	&$arr_param 쿼리 작성용 배열
    // 리턴 : Array / false
    // ------------------------
	function db_select_board2( &$conn, &$arr_param ) {
		$sql = 
			" SELECT "
			."		id "
			."		,title "
			."		,create_at "
			." FROM "
			." 		board2 "
			." WHERE "
			."		delete_flag = '0' "
			." ORDER BY "
			."		id DESC "
			." LIMIT :recent_list "
		;

		$arr_ps = [
			":recent_list" => $arr_param["recent_list"]
		];
		try {
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
    // 함수명 : db_insert_boards
    // 기능 : boards 데이터 추가
    // 파라미터 : PDO 	 &$conn
	//			 Array	&$arr_param 쿼리 작성용 배열
    // 리턴 : Boolean
    // ------------------------
	function db_insert_boards(&$conn, &$arr_param) {
		$sql = 
			" INSERT INTO board2( "
			."		title "
			."		,content "
			."		) "
			." VALUES( "
			."		:title "
			." 		,:content "
			." ) "
		;

		$arr_ps = [
			":title" => $arr_param["title"]
			,":content" => $arr_param["content"]
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

?>

