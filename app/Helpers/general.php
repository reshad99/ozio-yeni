<?php

/**
 * Get clean number from string
 *
 * @param string $number
 * @return string
 */
function getCleanNumber($number): string
{
    $cleanNumber = '';
    preg_match_all('!\d+!', $number, $matches);
    $cleanNumber = implode('', $matches[0]);
    return $cleanNumber;
}
