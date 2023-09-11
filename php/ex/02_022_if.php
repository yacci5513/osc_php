<?php
// if문 : 조건에 따라 서로 다른 처리를 나타내주는 문법
// 1이면 1등, 2이면 2등, 3이면 3등, 나머지는 순위 외, 5번만 특별상을 출력

	$num1 = 1;
	if( $num1 === 1 ) {
		echo "1등";
	}
	else if( $num1 === 2 ) {
		echo "2등";
	}
	else if( $num1 === 3 ) {
		echo "3등";
	}
	else {
		if ( $num1 === 5 ){
			echo "특별 상";
		}
		echo "순위 외";
	}
?>