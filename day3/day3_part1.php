<?php
$values = file('input.txt', FILE_IGNORE_NEW_LINES);

$priorityList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$prioritiesTotal = 0;

foreach ($values as $value) {
    // split at half way point
    $compartments = array_map(function ($v) {
        return str_split($v);
    }, str_split($value, strlen($value) / 2));
    $duplicateChar = checkDuplicateItem($compartments);
    $prioritiesTotal += strpos($priorityList, $duplicateChar) + 1;
}

echo $prioritiesTotal;

/**
 * Checks which item appears in both compartments
 *
 * @param array $compartments
 * @return string|null
 */
function checkDuplicateItem(array $compartments): string|null
{
    foreach ($compartments[0] as $item) {
        if (in_array($item, $compartments[1])) {
            return $item;
        }
    }
    return null;
}
