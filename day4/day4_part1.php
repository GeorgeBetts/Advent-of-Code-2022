<?php
$values = file('input.txt', FILE_IGNORE_NEW_LINES);

$totalOverlaps = 0;
foreach ($values as $value) {
    $totalOverlaps += checkOverlap(array_map(function ($v) {
        return explode("-", $v);
    }, explode(",", $value))) ? 1 : 0;
}

echo $totalOverlaps;

/**
 * Checks if pair overlaps one another completely i.e. it 'contains' the other
 *
 * @param array $pairs e.g. [0 => [2,6], 1 => [3,5]] // example DOES contain
 * @return boolean
 */
function checkOverlap(array $pairs): bool
{
    $pair0Len = count($pairs[0]) - 1;
    $pair1Len = count($pairs[1]) - 1;
    if ($pairs[0][0] >= $pairs[1][0] && $pairs[0][$pair0Len] <= $pairs[1][$pair1Len]) {
        return true;
    }
    if ($pairs[1][0] >= $pairs[0][0] && $pairs[1][$pair1Len] <= $pairs[0][$pair0Len]) {
        return true;
    }
    return false;
}
