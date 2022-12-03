<?php
$values = file('input.txt', FILE_IGNORE_NEW_LINES);

$moves = [
    'A' => [
        'name' => 'Rock',
        'points' => 1,
        'beats' => 'C',
        'loses' => 'B',
    ],
    'B' => [
        'name' => 'Paper',
        'points' => 2,
        'beats' => 'A',
        'loses' => 'C',
    ],
    'C' => [
        'name' => 'Scissors',
        'points' => 3,
        'beats' => 'B',
        'loses' => 'A',
    ],
];

// loop through the strategy
$totalScore = 0;
foreach ($values as $value) {
    $round = explode(" ", $value);
    $playerMove = $round[1];
    $opponentMove = $moves[$round[0]];
    $roundScore = 0;
    if ($playerMove == 'Y') {
        $roundScore += 3;
        $roundScore += $moves[$round[0]]['points'];
    } elseif ($playerMove == 'Z') {
        $roundScore += 6;
        $roundScore += $moves[$opponentMove['loses']]['points'];
    } else {
        $roundScore += $moves[$opponentMove['beats']]['points'];
    }
    $totalScore += $roundScore;
}

echo $totalScore;
