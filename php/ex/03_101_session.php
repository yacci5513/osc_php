<?php
    // session : 데이터를 웹서버에 저장, 쿠키보다 보안성이 좋음
    // *** 주의사항 ***
    // 개인정보, 민감한 정보들은 되도록 저장하지 말아야한다.

    //세션 시작
    session_name("green"); //특정 세션명으로 시작하는 방법
    session_start();
    
    //세션 만들기
    $_SESSION["green"] = "PHP";
    $_SESSION["green2"] = "JAVA";
    print_r($_SESSION);
    
    //특정 세션 삭제
    // unset($_SESSION["green"]);

?>