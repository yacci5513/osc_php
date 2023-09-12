<?php
	// $i=0;
	// while($i <= 9){
	// 	$z=2*$i;
	// 	echo "2 X {$i} = {$z}\n";

	// 	$i++;
	// }

// 방법 2 구구단 9단까지 출력
	$i=1;
	while(1){
		echo "{$i}단\n";
		$z=1;
		while(1){
			$mul=$i*$z;
			echo "{$i} X {$z} = {$mul}\n";
			if($z===9){
				break;
			}
			$z++;
		}
		if($i===9){
			break;
		}
		$i++;
	}

	// do-while : 무조건 한번은 실행하고 그 다음부터 조건이 참이면 루프하는 문법
	$i=0;
	do{
		echo "ttt";
	}
	while($i < 0);
?>