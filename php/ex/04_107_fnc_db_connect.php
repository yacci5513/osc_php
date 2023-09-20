<?php
    // ******************************
    // 파일명 : 04_107_fnc_db_connect.php
    // 기능 : DB 연동 관련 함수
    // 버전 : v001 new Oh.sc 230918
    //        v002 dbconn 설정 변경 Oh.sc 230918
    // ******************************

    // ------------------------
    // 함수명 : my_db_conn
    // 기능 : DB connect
    // 파라미터 : PDO  &$conn
    // 리턴 : boolean
    // ------------------------

    function my_db_conn( &$conn ) { //reference 파라미터 = (&) 변수 주소값을 넘겨 받는다.
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

    // ------------------------
    // 함수명 : my_db_destroy_conn
    // 기능 : DB Destroy
    // 파라미터 : PDO  &$conn
    // 리턴 : 없음
    // ------------------------
    function my_db_destroy_conn( &$conn ) {
        $conn = null;
    }

    // -----------------------my_db_conn 에서 오류 났을 때
    // $conn = null;
    // if ( !my_db_conn($conn) ) {
    //     echo "DB Connect Error";
    //     exit; // php 처리를 종료
    // }
?>