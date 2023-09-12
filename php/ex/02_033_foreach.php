<?php
	// foreach는 배열을 처리하기 위한 반복문

	// for 반복문을 이용해 배열을 출력하는 방법
	// $array = [1, 2, 3];
	// $array_count = count($array)-1;
	// for($i=0; $i <= $array_count; $i++){
	// 	echo $array[$i];
	// }

	// foreach 반복문을 이용해 배열을 출력하는 방법
	// $array = [1, 2, 3];
	// foreach($array as $ar){
	// 	echo $ar;
	// }

	// foreach 반복문을 이용해 연관배열 출력하는 방법
	$array = ["name" => "미우"
		,"id" => "miu"
	];
	foreach($array as $index => $value){
		echo "{$index} : {$value}\n";
	}

	// 키가 필요 없을 때 value만 출력하는 방법
	$array = ["name" => "미우"
	,"id" => "miu"
	];
	foreach($array as $value){
		echo "{$value}\n";
	}
?>
