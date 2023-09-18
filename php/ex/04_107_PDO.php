<?php
    $db_host = "localhost"; // host
    $db_user = "root"; //user
    $db_pw = "php504"; // password
    $db_name = "employees"; // DB name
    $db_charset = "utf8mb4"; // charset
    $db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

    $db_options = [
        // DB의 Prepared Statement 기능을 사용하도록 설정
        PDO::ATTR_EMULATE_PREPARES => false
        // PDO Exception을 Throws하도록 설정
        ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        // 연상배열로 Fetch를 하도록 설정
        ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
	//PDO Class로 DB연동
	$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);

    //SQL 작성
    // $sql =" SELECT "
    //     ."		* "
    //     ." FROM "
    //     ."      employees "
    //     ." WHERE "
    //     ."      emp_no = :emp_no " //;는 sql injection 방지하기 위해 넣지 않음.
    //     ;
	
	//Prepared Statement setting
	// $arr_ps = [
	// 	":emp_no" => 10004
	// ];

	//Prepared Statement 생성
	// $stmt = $obj_conn->prepare($sql);
	// $stmt->execute($arr_ps); //쿼리 실행
	// $result = $stmt->fetchAll(); // 쿼리 결과를 fetch
	// print_r($result);

	//------------------------ 사번 10001,100002의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력해주세요
	// $sql =
	// 	" SELECT "
	// 	."		sal.salary"
	// 	."		, emp.emp_no"
	// 	."		, emp.birth_date "
	// 	." FROM "
	// 	."      employees as emp "
	// 	."		JOIN "
	// 	."			salaries as sal "
	// 	."		ON "
	// 	."			emp.emp_no = sal.emp_no "
	// 	." WHERE ( "
	// 	."      emp.emp_no = :emp_no1 "
	// 	."		OR "
	// 	."		emp.emp_no = :emp_no2
	//	."		) "
	// 	."		AND "
	// 	."		sal.to_date >= NOW() "  //;는 sql injection 방지하기 위해 넣지 않음.
	// 	;
	
	// $arr_ps = [
	// 	":emp_no1" => 10001
	// 	,":emp_no2" => 10002
	// ];

	// $stmt = $obj_conn->prepare($sql);
	// $stmt->execute($arr_ps); //쿼리 실행
	// $result = $stmt->fetchAll(); // 쿼리 결과를 fetch
	// print_r($result);

	//----------------------------------- INSERT
	// $sql =
	// "INSERT INTO departments( "
	// ."		 dept_no "
	// ."		 , dept_name "
	// ."		 ) "
	// ." VALUES( "
	// ."		 :dept_no "
	// ."		 , :dept_name "
	// ."		 ) ";

	// $arr_ps = [
	// 	":dept_no" => "d010"
	// 	,":dept_name" => "php504"
	// ];

	// $stmt = $obj_conn->prepare($sql);
	// $result = $stmt->execute($arr_ps); //쿼리 실행
	// $obj_conn->commit(); //커밋
	// $obj_conn = null; //파기를 해줘야 한다.

	//-------------------------------- DELETE
	$sql = 
		" DELETE FROM "
		."		 departments " 
		." WHERE "
		."		 dept_no = :dept_no "
		;

	$arr_ps = [
		":dept_no" => "d010"
	];

	$stmt = $obj_conn->prepare($sql);
	$result = $stmt->execute($arr_ps); //쿼리 실행
	$obj_conn = null; //파기를 해줘야 한다.
	$res_cnt = $stmt->rowCount();
	if($res_cnt > 2 ) {
		$obj_conn->rollback();
	}
	else {
		$obj_conn->commit(); //커밋
	}
?>