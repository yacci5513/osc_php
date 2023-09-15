<?php
	// $opp = ["rock", "paper", "scissors"];
	// while(1){
	// 	echo "\n*****가위바위보 게임*****\n";
	// 	echo "1.rock 2.paper 3.scissors 중 하나의 값을 입력해주세요. 나가려면 exit를 입력해주세요"."\n"." ex)input : rock"."\n"." input : ";
	// 	$in_str =  trim(fgets(STDIN));
	// 	$opp_rand_key = array_rand($opp);
	// 	$opp_rand_value = $opp[$opp_rand_key];
	// 	$answer= "*************************"."\n"."admin : {$in_str}"."\n"."opp : {$opp_rand_value}\n";

	// 	if ($in_str === "rock"){
	// 		if($opp_rand_value === $opp[0]){
	// 			echo $answer."무승부\n";
	// 		}
	// 		else if ($opp_rand_value === $opp[1]){
	// 			echo $answer."패배\n";
	// 		}
	// 		else if ($opp_rand_value === $opp[2]){
	// 			echo $answer."승리\n";
	// 		}
	// 		else {
	// 			echo "error";
	// 		}
	// 	}
	// 	else if ($in_str === "paper") {
	// 		if($opp_rand_value === $opp[0]){
	// 			echo $answer."승리";
	// 		}
	// 		else if ($opp_rand_value === $opp[1]){
	// 			echo $answer."무승부";
	// 		}
	// 		else if ($opp_rand_value === $opp[2]){
	// 			echo $answer."패배";
	// 		}
	// 		else {
	// 			echo "error";
	// 		}
	// 	}
	// 	else if ($in_str === "scissors") {
	// 		if($opp_rand_value === $opp[0]){
	// 			echo $answer."패배";
	// 		}
	// 		else if ($opp_rand_value === $opp[1]){
	// 			echo $answer."승리";
	// 		}
	// 		else if ($opp_rand_value === $opp[2]){
	// 			echo $answer."무승부";
	// 		}
	// 		else {
	// 			echo "error";
	// 		}
	// 	}
	// 	else if ($in_str === "exit"){
	// 		echo "종료되었습니다.";
	// 		break;
	// 	}
	// 	else {
	// 		echo "잘못된 값을 입력하였습니다.";
	// 	}
	// }

	// // 더 짧게 짤수 있는 방법
	// 	echo "*****가위바위보 게임*****\n";
	// 	echo "1.rock 2.paper 3.scissors 중 하나의 값을 입력해주세요."."\n"." ex)input : rock"."\n"." input : ";
	// 	$opp = ["rock", "paper", "scissors"];
	// 	$in_str =  trim(fgets(STDIN));
	// 	$opp_rand_key = array_rand($opp);
	// 	$opp_rand_value = $opp[$opp_rand_key];   
	// 	$answer= "*************************"."\n"."admin : {$in_str}"."\n"."opp : {$opp_rand_value}\n";
	// 	if($in_str===$opp[$opp_rand_key]){
	// 		echo $answer."무승부\n";
	// 	}
	// 	else if ((($in_str===$opp[0]) && ($opp_rand_value===$opp[2]))
	// 		|| (($in_str===$opp[1]) && ($opp_rand_value===$opp[0]))
	// 		|| (($in_str===$opp[2]) && ($opp_rand_value===$opp[1]))
	// 		) {
	// 		echo $answer."승리\n";
	// 	}
	// 	else if ((($in_str===$opp[0]) && ($opp_rand_value===$opp[1]))
	// 		|| (($in_str===$opp[1]) && ($opp_rand_value===$opp[2]))
	// 		|| (($in_str===$opp[2]) && ($opp_rand_value===$opp[0]))
	// 		) {
	// 		echo $answer."패배\n";
	// 	}
	// 	else {
	// 		echo "잘못된 값을 입력하였습니다.\n";
	// 	}




	//숫자 맞추기 게임
	$number=rand(0,100);
	$i=0;
	$number=6;
	echo "*****숫자 맞추기 게임*****\n";
	echo "1~100사이의 숫자를 입력해주세요 총 {$number}번의 기회가 있습니다."."\n";
	while(true){
		echo "input : ";
		$user =(int)trim(fgets(STDIN));
		$i++;
		$z=$number-$i;
		if ($user > 100 || $user < 0){
			echo "입력한 숫자가 0~100이 아닙니다. 남은횟수 : {$z}"."\n";
		}
		else if($user > $number){
			echo "더 작음 남은횟수 : {$z}"."\n";
		}
		else if ($user < $number){
			echo "더 큼 남은횟수 : {$z}"."\n";
		}
		else{
			echo "정답!!";
			break;
		}
		if($i===$number){
			echo "실패!! 정답은 {$number} 입니다.";
			break;
		}
	}

?>