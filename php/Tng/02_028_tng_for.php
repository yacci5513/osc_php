<?php
// 1~10까지 숫자를 출력해 주세요.
	for ($i=1; $i<=10; $i++){
		echo $i, "\n";
	}

// 반복문을 이용하여 구구단 만들기
	for ($i=1; $i<=10; $i++){
		$mul=2*$i;
		$result = "2 X {$i} = {$mul}"."\n";
		echo $result;
	}
// 팩토리얼 계산
	// $s=1;
	// for ($i=1; $i<=10; $i++){
	// 	$s*=$i;
	// 	$result = "{$i}! = {$s}"."\n";
	// 	echo $result;
	// }



// // for문 2중반복
// 	for($i=1; $i<=9; $i++){
// 		echo "{$i}단"."\n";
// 		for ($z=1; $z<=9; $z++){
// 			$mul=$i*$z;
// 			$result = "{$i} X {$z} = {$mul}"."\n";
// 			echo $result;
// 		}
// 	}

// for문 2중반복 2단부터 8단까지 출력 안되게 1단과 0단만 나오게
for($i=1; $i<=9; $i++){
	if($i>=2 && $i<=8){
		continue;
	}
	echo "{$i}단"."\n";
	for ($z=1; $z<=9; $z++){
		$mul=$i*$z;
		$result = "{$i} X {$z} = {$mul}"."\n";
		echo $result;
	}
}

// 짝수 단수만 출력 안되게
for($i=1; $i<=9; $i++){
	if (($i%2)===0){
		continue;
	}
	echo "{$i}단"."\n";
	for ($z=1; $z<=9; $z++){
		$mul=$i*$z;
		$result = "{$i} X {$z} = {$mul}"."\n";
		echo $result;
	}
}

?>

