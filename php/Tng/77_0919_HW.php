<?php
    // ************************************************************************************************
    // -- employees에 70만번 추가하고 과제 시작
    // INSERT INTO employees
    // VALUES (
    //     700000
    //     ,20000101
    //     ,'first'
    //     ,'last'
    //     ,'M'
    //     ,'20230919'
    //     ,NULL
    // );
    // ************************************************************************************************
    // 1. titles 테이블에 데이터가 없는 사원을 검색 (employees + titles 테이블)
    // 2. [1]번에 해당하는 사원의 직책 정보를 titles 테이블에 insert
    // 2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101
    // 3. 주의점 : DB에 저장될 것
    // ************************************************************************************************
    function db_conn( &$conn ) { //reference 파라미터 = (&) 변수 주소값을 넘겨 받는다.
        $db_host = "localhost"; // host
        $db_user = "root"; //user
        $db_pw = "php504"; // password
        $db_name = "employees"; // DB name
        $db_charset = "utf8mb4"; // charset
        $db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
        
        try{
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

    function my_db_destroy_conn( &$conn ) {
        $conn = null;
    }
    // ************************************************************************************************
    // 1. titles 테이블에 데이터가 없는 사원을 검색
    // [1번 쿼리문은 두 방식으로 진행 가능 (MINUS도 가능할 것 같지만 처리속도 이슈로 인해 NOT EXIST로 하였음)]
    // - SELECT emp.emp_no
    // FROM employees AS emp
    // LEFT OUTER JOIN titles AS tit
    // ON emp.emp_no = tit.emp_no
    // WHERE tit.emp_no IS NULL;

    // - SELECT emp.emp_no
    // FROM employees AS emp
    // WHERE NOT EXISTS (SELECT tit.emp_no FROM titles AS tit WHERE emp.emp_no = tit.emp_no);
    // ************************************************************************************************
	try {
        if ( !db_conn($conn) ) {
            echo "DB Connect Error";
            exit; // php 처리를 종료
        }
        $sql = 
            " SELECT "
            ."       emp.emp_no "
            ." FROM "
            ."       employees AS emp "
            ." WHERE "
            ."       NOT EXISTS ("
            ."           SELECT "
            ."               tit.emp_no "
            ."           FROM "
            ."               titles AS tit "
            ."           WHERE "
            ."               emp.emp_no = tit.emp_no "
            ."       ) "
        ;
        // ********************* prepare statement가 필요할 때 방법 ********************* 
        // $stmt = $conn->prepare($sql);
        // $stmt->execute(); //쿼리 실행
        // $result = $stmt->fetchAll();
        // ********************* prepare statement가 필요없을때 방법 ********************* 
        $stmt = $conn->query($sql); //return은 prepare statement
        $result = $stmt->fetchAll();
        print_r($result); // $result의 값은 2차원 배열의 형태
        // ************************************************************************************ 



        // ************************************************************************************************
        // 2. [1]번에 해당하는 사원의 직책 정보를 insert
        // 2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101
        // ************************************************************************************************
        $sql = 
            " INSERT INTO titles "
            ." VALUES ("
            ."       :emp_no "
            ."      ,:title "
            ."      ,NOW() "
            ."      ,:to_date "
            ." ) "
        ;
        
        $stmt = $conn->prepare($sql);
        foreach ($result as $item) {
            $arr_ps = [
                ":emp_no" => $item['emp_no']
                ,":title" => "green"
                ,":to_date" => 99990101
            ];
            $result = $stmt->execute($arr_ps);
            if (!$result) {
                throw new Exception("Insert Error");
            }
        }  // 반복문을 통해 :eml_no에 값을 지속적으로 추가 및 execute문을 통한 쿼리 실행
        $conn->commit();
        echo "커밋성공";
	}
	catch(Exception $e){
        $conn ->rollback();
		echo "ERROR : {$e->getMessage()}";
	}
	finally {
		my_db_destroy_conn($conn);
	}
?>