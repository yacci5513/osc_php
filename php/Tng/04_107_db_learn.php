<?php

    function db_conn( &$conn ) {
        $db_host = "localhost";
        $db_user = "root";
        $db_pw = "php504";
        $db_name = "employees";
        $db_charset = "utf8mb4";
        $db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
        
        $db_options = [
            // DB의 Prepared Statement 기능을 사용하도록 설정
            PDO::ATTR_EMULATE_PREPARES => false
            // PDO Exception을 Throws하도록 설정
            ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            // 연상배열로 Fetch를 하도록 설정
            ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
    }

    // 사원별 현재 급여를 조회하기
    // $conn = null;
	// try {
    //     db_conn($conn);
    //     $sql = 
    //        " SELECT "
    //        ."    emp_no "
    //        ."    , salary "
    //        ." FROM "
    //        ."    salaries "
    //        ."  WHERE "
    //        ."    to_date >= NOW() "
    //        ."    AND salary >= :salary "
    //     ;
    
    //     $arr_ps = [
    //         ":salary"=>80000
    //     ];
    
    //     $stmt = $conn->prepare($sql);
    //     $stmt->execute($arr_ps); //쿼리 실행
    //     $result = $stmt->fetchAll();
    //     print_r($result);
    //     echo  "성공";
	// 	$conn->commit();
	// }
	// catch(Exception $e){
	// 	echo "예외 발생 : {$e->getMessage()}";
	// }
	// finally {
	// 	$conn=NULL;
	// }

    // 조회한 데이터를 루프하면서 급여가 100,000이상인 사원 번호 출력해주세요
    $conn = null;
	try {
        db_conn($conn);
        $sql = 
           " SELECT "
           ."    emp_no "
           ."    , salary "
           ." FROM "
           ."    salaries "
           ."  WHERE "
           ."    to_date >= NOW() "
           ."    AND salary >= :salary "
        ;
    
        $arr_ps = [
            ":salary"=>80000
        ];
    
        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps); //쿼리 실행
        $result = $stmt->fetchAll();
        $item_2=[];
        foreach($result as $key => $item) {
            if($item["salary"] >= 100000) {
                array_push($item_2, $item["emp_no"]);
            }
        }
        print_r($item_2);
        echo "총 개수(count) : ".count($item_2);
	}
	catch(Exception $e){
		echo "예외 발생 : {$e->getMessage()}";
	}
	finally {
		$conn=NULL;
	}
?>