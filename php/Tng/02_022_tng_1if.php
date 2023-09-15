<?php
/*$score = -1000;
if($score === 100)
{
  echo "당신의 점수는 {$score}점입니다 A+";
}else if($score >= 90){
  echo "당신의 점수는 {$score}점입니다 A";
}else if($score >= 80){
  echo "당신의 점수는 {$score}점입니다 B";
}else if($score >= 70){
  echo "당신의 점수는 {$score}점입니다 C";
}else if($score >= 60){
  echo "당신의 점수는 {$score}점입니다 D";}
  else if($score > -5000){
    echo "당신의 점수는 {$score}점입니다 F";}
*/
$num = -1000;
$grade = "";
$answer = "당신의 점수는 %u점 입니다,. <%s>";
if($num >= 0 && $num <=100) {
    $grade = "A+";
}
else if($num >=90) {
    $grade = "A";
}
else if($num >=80) {
    $grade = "B";
}
else if($num >=70) {
    $grade = "C";
}
else if($num >=60) {
    $grade = "D";
}
else if($num >60) {
    $grade = "F";
}
else {
    echo "잘못된 값을 입력했습니다.";
}
$str = {sprintf ($answer,  $num, $grade);
cho $str;
}
?>
