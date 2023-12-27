<?php
function quickSort(&$arr, $left, $right) {
    if ($left < $right) {
        $pivotIndex = partition($arr, $left, $right);

        quickSort($arr, $left, $pivotIndex - 1);
        quickSort($arr, $pivotIndex + 1, $right);
    }
}

function partition(&$arr, $left, $right) {
    $pivot = $arr[$right];
    $i = $left - 1;

    for ($j = $left; $j < $right; $j++) {
        if ($arr[$j] < $pivot) {
            $i++;
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
        }
    }

    $temp = $arr[$i + 1];
    $arr[$i + 1] = $arr[$right];
    $arr[$right] = $temp;

    return $i + 1;
}

echo "몇 개의 숫자를 입력하시겠습니까?: ";
$N = intval(trim(fgets(STDIN)));

echo "{$N}개의 숫자를 입력하세요:\n";
$numbers = [];
for ($i = 0; $i < $N; $i++) {
    $numbers[] = intval(trim(fgets(STDIN)));
}

// 퀵 정렬 수행
quickSort($numbers, 0, $N - 1);

// 정렬된 숫자 출력
echo "정렬된 숫자는 다음과 같습니다:\n";
foreach ($numbers as $number) {
    echo $number . "\n";
}
?>
