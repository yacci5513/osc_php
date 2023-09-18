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

    //10004번 사원테이블의 사원정보를 출력해주세요
    $sql ="SELECT * FROM employees WHERE emp_no = 10004"; 
?>