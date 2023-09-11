<?php
	//for문 반복
	// $s = 1;
	// for ($i=0; $i<=10; $i++){
	// 	$s=2*$i;
	// 	echo "2 * {$i} = {$s}", "\n";
	// }
// break : for문을 종료하고 빠져나오는 문법;
for($i = 0; $i <= 2; $i++){
	echo "break 설명 (i={$i})\n";
	break;
}

//continue : continue아래에 있는 처리를 실행하지 않고 다음 루프로 진행
for($i = 0; $i <= 2; $i++){
	if($i===1){
		continue;
	}
	echo "continue 설명 (i={$i})\n";
}

// 이중 루프
for($i = 0; $i <= 1; $i++){
	for($z = 9; $z >= 8; $z--){
		echo "{$i},,,,{$z}"."\n";
	}
}
?>