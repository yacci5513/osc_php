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

	//나의 코드
	$text = '3424';
	$text_arr = [];
	$sum = 0;

	$len = mb_strlen($text)-1;
	for ($i=0; $i<=$len; $i++){
		$text_arr[$i]= mb_substr($text, $i, 1);
	}
	foreach($text_arr as $value){
		$sum += $value;
	}
	echo $sum;

// str_split 써도 된다.
// 	foreach 한번 더 쓸 필요 없었음
// 구조는 같으나 데이터타입 변경시 명시하는 부분 달랐음.

	// 강사님 코드
	$str = "34215";
	function my_test(string $str) {
		$len = mb_strlen($str);
		$sum = 0;
		for($idx = 0; $idx <= $len -1; $idx++) {
			$sum += (int)mb_substr($str, $idx, 1);
		}
		return $sum;
	}
	echo my_test($str);
	