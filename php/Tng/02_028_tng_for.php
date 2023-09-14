<?php
// 1~10까지 숫자를 출력해 주세요.
	// for ($i=1; $i<=10; $i++){
	// 	echo $i, "\n";
	// }

// 반복문을 이용하여 구구단 만들기
	// for ($i=1; $i<=10; $i++){
	// 	$mul=2*$i;
	// 	$result = "2 X {$i} = {$mul}"."\n";
	// 	echo $result;
	// }
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
// for($i=1; $i<=9; $i++){
// 	if($i>=2 && $i<=8){
// 		continue;
// 	}
// 	echo "{$i}단"."\n";
// 	for ($z=1; $z<=9; $z++){
// 		$mul=$i*$z;
// 		$result = "{$i} X {$z} = {$mul}"."\n";
// 		echo $result;
// 	}
// }

// // 짝수 단수만 출력 안되게
// for($i=1; $i<=9; $i++){
// 	if (($i%2)===0){
// 		continue;
// 	}
// 	echo "{$i}단"."\n";
// 	for ($z=1; $z<=9; $z++){
// 		$mul=$i*$z;
// 		$result = "{$i} X {$z} = {$mul}"."\n";
// 		echo $result;
// 	}
// }

// // 
// for($i=1; $i<=9; $i++){
// 	if (($i%2)===0){
// 		continue;
// 	}
// 	echo "{$i}단"."\n";
// 	for ($z=1; $z<=10; $z++){
// 		$mul=$i*$z;
// 		$result = "{$i} X {$z} = {$mul}"."\n";
// 		echo $result;
// 	}
// }


// 반복문을 이용해서 아래처럼 출력해주세요
// 함수 사용 x
	// $text= "*";
	// $count= 5;
	// for($i=1; $i<=$count; $i++) {
	// 	for ($y=1; $y<=$i; $y++){
	// 		echo $text;
	// 	}
	// 	echo "\n";
	// }
// 함수 사용하는 거
	// $text= "*";
	// $count= 5;
	// for($i=1; $i<=$count; $i++) {
	// 	echo str_repeat($text,$i);
	// 	echo "\n";
	// }
// 별 오른쪽 가게 출력
	// $text= "*";
	// $count= 5;
	// for($x=1; $x<=$count; $x++) {
	// 	for($y=1; $y<=$count-$x; $y++){
	// 		echo " ";
	// 	}
	// 	for ($z=1; $z<=$x; $z++){
	// 		echo $text;
	// 	}
	// 	echo "\n";
	// }

// 삼각형
	// $text= "*";
	// $count= 5;

	// for($x=1; $x<=$count; $x++) {
	// 	for($y=1; $y<=$count-$x; $y++){
	// 		echo " ";
	// 	}
	// 	for ($z=1; $z<=$x*2-1; $z++){
	// 		echo $text;
	// 	}
	// 	echo "\n";
	// }

// 마름모
	// $text= "*";
	// $count= 5;
	
	// for($x=1; $x<=$count; $x++) {
	// 	for($y=1; $y<=$count-$x; $y++){
	// 		echo " ";
	// 	}
	// 	for ($z=1; $z<=$x*2-1; $z++){
	// 		echo $text;
	// 	}
	// 	echo "\n";
	// }
	// for($x=1; $x<$count; $x++) {
	// 	for($y=1; $y<=$x; $y++){
	// 		echo " ";
	// 	}
	// 	for ($z=1; $z<=($count-$x)*2-1; $z++){
	// 		echo $text;
	// 	}
	// 	echo "\n";
	// }

?>