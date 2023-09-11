<?php
//1등 금상, 2등 은상, 3등 동상, 4등 장려상, 그 외 노력상
	// $ranking=1;
	// $prize=["금상", "은상", "동상", "장려상", "노력상"];
	// $answer="";
	// switch($ranking){
	// 	case 1:
	// 		$answer = $prize[0];
	// 		break;
	// 	case 2:
	// 		$answer = $prize[1];
	// 		break;
	// 	case 3:
	// 		$answer = $prize[2];
	// 		break;
	// 	case 4:
	// 		$answer = $prize[3];
	// 		break;
	// 	default:
	// 		$answer = $prize[4];
	// 		break;
	// }
	// echo $answer;
	
//같은걸 if로 만들기
	$ranking=1;
	$prize=["금상", "은상", "동상", "장려상", "노력상"];
	$answer="";
	if($ranking===1){
		$answer = $prize[0];
	}
	else if($ranking===2){
		$answer = $prize[1];
	}
	else if($ranking===3){
		$answer = $prize[2];
	}
	else if($ranking===4){
		$answer = $prize[3];
	}
	else{
		$answer = $prize[4];
	}
	echo $answer;
?>