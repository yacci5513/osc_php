<?php
    // PDO 클래스를 이용해서 아래 쿼리를 실행해주세요
    // 1. 자신의 사원 정보를 employees 테이블에 등록해주세요
    // 2. 자신의 이름을 "둘리", 성을 "호이"로 변경해주세요
    // 3. 자신의 정보를 출력해주세요
    // 4. 자신의 정보를 삭제해주세요
    // 5. PDO 클래스 사용법 숙지
	

    function my_db_conn( &$conn ) { //reference 파라미터 = (&) 변수 주소값을 넘겨 받는다.
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
        $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
    }

    function my_db_destroy_conn( &$conn ) {
        $conn = null;
    }
	// ----------------------------------------------------------------------------------------------------

	// 1. 자신의 사원 정보를 employees 테이블에 등록해주세요-----------------
	// $conn = null;
	// try {
	// 	my_db_conn($conn);
	// 	$sql =
	// 		" INSERT INTO "
	// 		."		 employees( "
	// 		."		 emp_no "
	// 		."		 , birth_date "
	// 		."		 , first_name "
	// 		."		 , last_name "
	// 		."		 , gender "
	// 		."		 , hire_date "
	// 		."		 , sup_no "
	// 		."		  ) "
	// 		." VALUES( "
	// 		."		 :emp_no "
	// 		."		 , :birth_date "
	// 		."		 , :first_name "
	// 		."		 , :last_name "
	// 		."		 , :gender "
	// 		."		 , :hire_date "
	// 		."		 , :sup_no ) "
	// 	;
	// 	$arr_ps = [
	// 		":emp_no" => 1000000
	// 		,":birth_date" => '1997-12-29'
	// 		,":first_name" => 'seongchan'
	// 		,":last_name" => 'oh'
	// 		,":gender" => 'M'
	// 		,":hire_date" => '2023-09-18'
	// 		,":sup_no" => 1
	// 	];
	// 	$stmt = $conn->prepare($sql);
	// 	$result = $stmt->execute($arr_ps); //쿼리 실행
	// 	echo  "성공";
	// 	$conn->commit();
	// }
	// catch(Exception $e){
	// 	echo "예외 발생 : {$e->getMessage()}";
	// }
	// finally {
	// 	my_db_destroy_conn($conn);
	// }

	// 2. 자신의 이름을 "둘리", 성을 "호이"로 변경해주세요---------------------
	// $conn = null;
	// try {
	// 	my_db_conn($conn);
	// 	$sql =
	// 		" UPDATE "
	// 		."		 employees "
	// 		." SET "
	// 		."		 first_name= :first_name "
	// 		."		 , last_name= :last_name "
	// 		." WHERE "
	// 		."		 emp_no = :emp_no "
	// 		;

	// 	$arr_ps = [
	// 		":emp_no" => 1000000
	// 		,":first_name" => '둘리'
	// 		,":last_name" => '호이'
	// 	];
	// 	$stmt = $conn->prepare($sql);
	// 	$result = $stmt->execute($arr_ps); //쿼리 실행
	// 	echo  "성공";
	// 	$conn->commit();
	// }
	// catch(Exception $e){
	// 	echo "예외 발생 : {$e->getMessage()}";
	// }
	// finally {
	// 	my_db_destroy_conn($conn);
	// }

	// 3. 자신의 정보를 출력해주세요----------------------------
	// $conn = null;
	// try {
	// 	my_db_conn($conn);
	// 	$sql =
	// 		" SELECT "
	// 		."		 * "
	// 		." FROM "
	// 		."		 employees "
	// 		." WHERE "
	// 		."		 emp_no = :emp_no "
	// 		;
	// 	$arr_ps = [
	// 		":emp_no" => 1000000
	// 	];
	// 	$stmt = $conn->prepare($sql);
	// 	$stmt->execute($arr_ps); //쿼리 실행
	// 	$result = $stmt->fetchAll(); // 쿼리 결과를 fetch
	// 	print_r($result);
	// 	$conn->commit();
	// }
	// catch(Exception $e){
	// 	echo "예외 발생 : {$e->getMessage()}";
	// }
	// finally {
	// 	my_db_destroy_conn($conn);
	// }

	// 4. 자신의 정보를 삭제해주세요--------------------------
	// $conn = null;
	// try {
	// 	my_db_conn($conn);
	// 	$sql =
	// 		" DELETE FROM "
	// 		."		 employees "
	// 		." WHERE "
	// 		."		 emp_no = :emp_no "
	// 		;
	// 	$arr_ps = [
	// 		":emp_no" => 1000000
	// 	];
	// 	$stmt = $conn->prepare($sql);
	// 	$stmt->execute($arr_ps); //쿼리 실행
	// 	echo  "성공";
	// 	$conn->commit();
	// }
	// catch(Exception $e){
	// 	echo "예외 발생 : {$e->getMessage()}";
	// }
	// finally {
	// 	my_db_destroy_conn($conn);
	// }
?>