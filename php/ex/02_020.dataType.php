<?php
// int : 숫자
	$num = 1;
// string : 문자열
	$str = "ssss";
// arr : 배열
	$arr = [1, 2, 3];
// double : 실수
	$double = 2.343;
// boolean : 논리(참/거짓)
	$bool = false;
// NULL
	$obj = NULL;
// 데이터 타입 알려주는 함수 : gettype()
	echo gettype($obj);
	
	$num1 = 1;
	$str1 = "1";
// 형변환 : 변수 앞에 (데이터타입)$변수명
	echo $str1 + $num1; // 문자열을 자동으로 숫자로 바꿔줌 (나중에 실수할수 있으니 조심)
	echo $str1 + (int)$num1;
	
	?>