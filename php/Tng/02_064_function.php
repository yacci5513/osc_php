<?php
/*$numbers = [8, 50, 15, 20];
$sum = 0;

foreach ($numbers as $number) {
    $sum += $number;
}

echo "합계: " . $sum;*/
/*function sumNumbers(...$numbers) {
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum; 
}


$result = sumNumbers(8, 50, 15, 20);
echo "합계: " . $result;*/



/*function sumNumbers(...$numbers) {
    return array_sum($numbers);
}

$result = sumNumbers(8, 50, 15, 20);
echo "합계: " . $result;*/



/*function items(...$numbers) {
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

echo items(8, 50, 15, 20);*/
/*function items($n) {
    $sum = 0;
    foreach (range(1, $n) as $i) {
        $sum += $i;
    }
    return $sum;
}

$result = items(10000);
echo $result;*/

/*function items($n) {
    $sum = 0;
    for ($i = 1; $i <= $n; $i++) {
        $sum += $i;
    }
    return $sum;
}

$result = items(10000);
echo $result;*/


/* function items(...$numbers) 라인은 가변 인수를 받아들이는 함수를 정의,...$numbers 구문은 여러 개의 인수를 배열 $numbers로 묶어줌
$sum = 0; 라인에서는 총합을 저장하기 위한 변수 $sum을 초기화 함
foreach ($numbers as $number) 루프는 $numbers 배열의 각 요소를 순회하며 각 숫자를 $number 변수에 할당함
$sum += $number; 라인에서는 현재 순회 중인 $number 값을 $sum 변수에 더합니다. 이렇게 반복하면 배열에 있는 모든 숫자의 합이 $sum 변수에 누적됨
return $sum; 라인은 최종적으로 계산된 합계를 반환함
echo items(8, 50, 15, 20); 라인은 함수를 호출하고, 함수는 전달된 숫자들을 모두 더한 결과를 반환합니다. 그 결과를 echo를 통해 출력함
8 + 50 + 15 + 20의 결과인 93이 출력됨.*/



    /*for ($a = 1; $a <= 5; $a++)   

    {   for ($b = 1; $b <= $a; $b++)   
        {
            echo "*";   
        }
        echo "\n";   
    }
    for ($a = 1; $a <= 10; $a++)  */

    /*$i = "*";
    for ($a = 1; $a <= 5; $a++) {
        echo "{$i}";
        $i .= "*"; 
        echo"\n";
    }

    $i = "*";*/

    /*for ($a = 1; $a <= 5; $a++) {
        echo str_repeat(" ", 5 - $a) . $i . "\n";
        $i .= "*";
        
    }*/


    /*for ($a = 5; $a >= 1; $a--) {
        for ($b = 1; $b <= $a; $b++) {
            echo "*";
        }
        echo "\n";
    }*/
    
  
?>
