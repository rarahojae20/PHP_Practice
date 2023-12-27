<?php
// 랜덤한 나이 생성 (1살~40살)
$age = rand(1, 40);

// 성인 여부 확인
if ($age >= 20) {
    $status = "성인";
} else {
    $status = "미성년자";
}

// 결과 출력
echo "당신은 {$age}살로 {$status}입니다.";
?>
