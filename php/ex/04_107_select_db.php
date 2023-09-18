<?php
    require_once("./04_107_fnc_db_connect.php");

    $conn = null; //객체를 담는 변수는 초기화 선언시 null로 선언함
    my_db_conn($conn);

    $sql =" SELECT "
        ."		* "
        ." FROM "
        ."      employees "
        ." WHERE "
        ."      emp_no = :emp_no " //;는 sql injection 방지하기 위해 넣지 않음.
        ;
    
	$arr_ps = [
		":emp_no" => 10004
	];

	$stmt = $conn->prepare($sql);
	$stmt->execute($arr_ps); //쿼리 실행
	$result = $stmt->fetchAll(); // 쿼리 결과를 fetch
	print_r($result);
    my_db_destroy_conn($conn); // 파기 보통은 함수로 만들어 둠
?>