<?php
	//배열 길이 더해주는 함수
	// function my_arrlen($arr){
	// 	$count = 0;
	// 	foreach($arr as $value){
	// 		$count++;
	// 	}
	// 	return $count;
	// }
	// $arr1=[1,2,3];
	// echo my_arrlen($arr1);

	// 몇개일지 모르는 여러개의 숫자를 다 더해주는 함수
	// function my_sum_param(...$items) {
	// 	$result = 0;
	// 	foreach($items as $value) {
	// 		$result += $value;
	// 	}
	// 	return $result;
	// }
	
	// echo my_sum_param(1, 2, 3, 4, 5);

	// function my_ap($i){
	// 	$sum=0;
	// 	for($z=$i; $z>0; $z--){
	// 		$sum+=$z;
	// 	}
	// 	return $sum;
	// }
	// echo my_ap(10000);

	// 재귀함수
	// function my_recursion($i) {
	// 	if( $i<=0 ) {
	// 		return 0;
	// 	}
	// 	return $i + my_recursion($i - 1);
	// }
	// echo my_recursion(4);


	// 숫자로 이루어진 문자열을 하나 받습니다.
	// 이 문자열의 모든 숫자를 더해주세요

	$text = '3424';
	$text_arr = [];
	$sum = 0;
	$mb_strlen_text = mb_strlen($text)-1;
	for ($i=0; $i<=$mb_strlen_text; $i++){
		$text_arr[$i]=(int)mb_substr($text, $i, 1);
	}
	foreach($text_arr as $value){
		$sum += $value;
	}
	echo $sum;