<?php
// 인덱스 배열
// 1. 멀티타입 배열
	$arr = array(0, "a", 2);
	$arr2 = [0, "a", 2];
	$arr3 = ["배열", $arr[1], $arr2[1]];

// 2. 연상 배열
	$arr4 = [
		"name" => "홍길동"
		,"age" => 18
		,"gender" => "남자"
	];
	echo $arr4["name"];

// 3. 다차원 배열
	$arr5 = [
		[11, 12, 13]
		,[21, 22, 23]
		,[31, 32, 33]
	];

	$arr6 = [
		"msg" => "ok"
		,"info" => [
			"name" => "홍길동"
			,"age" => 20
		]
	];

// 4. 배열 함수
	$arr_week =["Sun", "Mon", "delete", "Tue","Wed"];
// 배열의 원소 삭제 : unset()
	unset($arr_week[2]);
// 배열의 정렬 : asort(), arsort(), ksort(), krsort()
	$arr_asort = ["b", "a", "d", "c", "e"];
// 배열 값 오름차순
	asort($arr_asort);
	print_r($arr_asort);
// 배열 값 내림차순
	arsort($arr_asort);
	print_r($arr_asort);
// 배열 키 오름차순
	$arr_ksort = [
		"b" => "1"
		,"d" => "2"
		,"a" => "3"
		,"c" => "4"
	];
	ksort($arr_ksort);
	print_r($arr_ksort);
// 배열 값 내림차순
	krsort($arr_ksort);
	print_r($arr_ksort);
// 배열의 사이즈를 반환하는 함수 : count()
// A배열과 B배열을 비교해서 중복되지 않는 A배열의 원소를 반환
	$arr_diff1 = [1, 2, 3];
	$arr_diff2 = [1, 4, 5];
	$arr_diff = array_diff($arr_diff1, $arr_diff2);
	print_r($arr_diff);
// 배열에 값을 추가하는 함수 : array_push()
	$arr_push = [1,2,3];
	array_push($arr_push, 4, 5);
	print_r($arr_push);


?>