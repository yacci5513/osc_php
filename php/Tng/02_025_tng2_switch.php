<?php
// switch를 이용하여 작성
// 1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상, 그 외는 노력상 을 출력해주세요
$award = "6등";
switch ($award) {
    case "1등": 
        echo "금상"; 
        break;
    case "2등":
         echo 
         "은상"; 
         break;
    case "3등":
         echo "동상";
          break;
    case "4등":
         echo "장려상";
          break;
    default: 
        echo "노력상"; 
        break;
}
/*$award = "6등";
if ($award == "1등") {
    echo "금상";   
} elseif ($award == "2등") {
    echo "은상";
} elseif ($award == "3등") {
    echo "동상";
}  elseif ($award == "4등") {
    echo "장려상";
}    
else{  $award =" 노력상";}
echo $award;*/


?>