<?php
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

    // 1. titles 테이블에 데이터가 없는 사원을 검색
    // 2. [1]번에 해당하는 사원의 직책 정보를 insert
    // 2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101
    // 3. 주의점 : DB에 저장될 것

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

    // 1. titles 테이블에 데이터가 없는 사원을 검색

    // SELECT emp.emp_no
    // FROM employees AS emp
    // LEFT OUTER JOIN titles AS tit
    // ON emp.emp_no = tit.emp_no
    // WHERE tit.emp_no IS NULL;

    // SELECT emp.emp_no
    // FROM employees AS emp
    // WHERE NOT EXISTS (SELECT tit.emp_no FROM titles AS tit WHERE emp.emp_no = tit.emp_no);

    $conn = null;
	try {
        db_conn($conn);
        $sql = 
            " SELECT "
            ."       emp.emp_no "
            ." FROM "
            ."       employees AS emp "
            ." WHERE "
            ."       NOT EXISTS "
            ."           ( "
            ."           SELECT "
            ."               tit.emp_no "
            ."           FROM "
            ."               titles AS tit "
            ."           WHERE "
            ."               emp.emp_no = tit.emp_no "
            ."           ) "
        ;
    
        $stmt = $conn->prepare($sql);
        $stmt->execute(); //쿼리 실행
        $result = $stmt->fetchAll();
        print_r($result);


        // 2. [1]번에 해당하는 사원의 직책 정보를 insert
        // 2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101
        $sql = 
        " INSERT INTO"
        ."       titles "
        ." VALUES "
        ."       ( "
        ."       :emp_no "
        ."      ,:title "
        ."      ,NOW() "
        ."      ,:to_date "
        ."      ) "
        ;
        
        $stmt = $conn->prepare($sql);
        foreach ($result as $key=>$item) {
            $arr_ps = [
                ":emp_no" => $item['emp_no']
                ,":title" => "green"
                ,":to_date" => 99990101
            ];
            $result = $stmt->execute($arr_ps);
        }
        $conn->commit();
        echo "커밋성공";
	}
	catch(Exception $e){
		echo "예외 발생 : {$e->getMessage()}";
	}
	finally {
		$conn=NULL;
	}
?>