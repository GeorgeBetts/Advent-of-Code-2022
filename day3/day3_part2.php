<?php
$values = file('input.txt', FILE_IGNORE_NEW_LINES);

$priorityList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$prioritiesTotal = 0;

$groupIndex = 0;
$group = [];
foreach ($values as $value) {
    // add bag to group
    $group[] = str_split($value);
    if ($groupIndex == 2) {
        // calculate group priority and start a new group
        $duplicateChar = checkDuplicateItem($group);
        $prioritiesTotal += strpos($priorityList, $duplicateChar) + 1;
        $groupIndex = 0;
        $group = [];
        continue;
    }
    $groupIndex++;
}

echo $prioritiesTotal;

/**
 * Checks which item appears in all 3 bags
 *
 * @param array $bags
 * @return string|null
 */
function checkDuplicateItem(array $bags): string|null
{
    foreach ($bags[0] as $item) {
        if (in_array($item, $bags[1]) && in_array($item, $bags[2])) {
            return $item;
        }
    }
    return null;
}
