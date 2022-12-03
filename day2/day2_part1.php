<?php
$values = file('input.txt', FILE_IGNORE_NEW_LINES);

$moves = [
    'X' => [
        'name' => 'Rock',
        'points' => 1,
        'beats' => 'C',
        'draws' => 'A'
    ],
    'Y' => [
        'name' => 'Paper',
        'points' => 2,
        'beats' => 'A',
        'draws' => 'B'
    ],
    'Z' => [
        'name' => 'Scissors',
        'points' => 3,
        'beats' => 'B',
        'draws' => 'C'
    ],
];

// loop through the strategy
$totalScore = 0;
foreach ($values as $value) {
    $round = explode(" ", $value);
    $playerMove = $moves[$round[1]];
    $roundScore = $playerMove['points'];
    if ($playerMove['beats'] == $round[0]) {
        $roundScore += 6;
    } elseif ($playerMove['draws'] == $round[0]) {
        $roundScore += 3;
    }
    $totalScore += $roundScore;
}

echo $totalScore;
