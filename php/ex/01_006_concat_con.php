<?php
// 1. 연결 연산자
	// $str1 = "안녕";
	// $str2 = "하세요";
	// $str3 = $str1.$str2;
	// echo $str3;

	$str4 = "문자";
	$num1 = 1;
	$str5 = $str4.$num1;
	echo $str5, "\n";
	// 문자와 숫자를 연결했을때 문자열로 자동 형변환 해줌.

// 2. 상수 : 절대 변하지 않는 값
	define("NUM", 100);
	echo "상수 NUM : ".NUM;
	// 상수는 대문자로 적는게 개발자들 사이의 룰
?>

