<?php

$targetNumber = rand(1, 100);


$attempts = 0;


$maxAttempts = 5;

echo "1부터 100 사이의 숫자를 맞추는 게임을 시작합니다.\n";

while ($attempts < $maxAttempts) {

    $userInput = readline("숫자를 입력하세요 (1부터 100 사이): ");

    if (!is_numeric($userInput) || $userInput < 1 || $userInput > 100) {
        echo "올바른 숫자를 입력하세요.\n";
        continue;
    }

    $attempts++;

    if ($userInput < $targetNumber) {
        echo "더 큼\n";
    } elseif ($userInput > $targetNumber) {
        echo "더 작음\n";
    } else {
        echo "정답! 축하합니다.\n";
        break;
    }


    $remainingAttempts = $maxAttempts - $attempts;
    echo "남은 기회: {$remainingAttempts}번\n";
}

if ($attempts === $maxAttempts) {
    echo "실패! 정답은 {$targetNumber}입니다.\n";
}

echo "게임 종료\n";
?>
