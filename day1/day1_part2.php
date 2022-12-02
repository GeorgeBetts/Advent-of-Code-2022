<?php
$values = file('input.txt', FILE_IGNORE_NEW_LINES);

$elfIndex = 0;
$elfCalories = [0 => 0];

foreach ($values as $value) {
    if (!$value) {
        $elfIndex++;
        $elfCalories[$elfIndex] = 0;
        continue;
    }
    $elfCalories[$elfIndex] += $value;
}

sort($elfCalories);

$maxIndex = count($elfCalories) - 1;
echo $elfCalories[$maxIndex] + $elfCalories[$maxIndex - 1] + $elfCalories[$maxIndex - 2];
