<?php
// 리턴이 없는 함수
	function my_sum($a, $b){
		echo $a + $b;
	}

//리턴이 있는 함수
	function my_sum2($a, $b){
		return $a + $b;
	}

	// my_sum(1,2);
	// my_sum2(2,2);
	// 뒤에꺼는 출력을 하지 않는다 return 값을 가지기 때문에
	// 두개의 차이는 echo 차이
	// my sum2를 출력하고 싶으면
	// $result = my_sum2(2,2);
	// echo $result;


	// function my_sub($a, $b){
	// 	return $a - $b;
	// }
	// function my_mul($a, $b){
	// 	return $a * $b;
	// }
	// function my_div($a, $b){
	// 	return $a / $b;
	// }
	// function my_rem($a, $b){
	// 	return $a % $b;
	// }

	// $result = my_sub(3,2);
	// echo $result;

	//파라미터의 기본값이 설정되어 있는 함수
	// function my_sum3($a, $b=5){
	// 	return $a + $b;
	// }

	// //두번째 아규먼트 값을 주었을 때는 값이 5
	// echo my_sum3(3,2);
	// //두번째 아규먼트 값을 주지 않았을때는 값이 8
	// echo my_sum3(3);

	// 가변 파라미터
	// 1. php-5.6이상에서 가능
	// function my_args_param(...$items) {
	// 	print_r($items);
	// }
	// my_args_param("a", "b", "c");

	// // 2. php 그전 버전에서 사용하는 방법
	// function my_args_param() {
	//  func_get_args() 사용
	// }


	// 레퍼런스 파라미터 : &
	function test1( $str ) {
		$str = "함수 test1";
		return $str;
	}
	function test2( &$str ) {
		$str = "함수 test2";
		return $str;
	}

	$st = "???";
	test1($st);
	echo $st;

	$st = "???";
	$result = test2($st);
	echo $st."\n";
	echo $result;
	//test2는 레퍼런스 파라미터 이기 때문에 $st에 "함수 test2"가 담긴다.

	// $str = "???";
	// $result = test1($str);
	// echo $str;
	// echo $result;
?>