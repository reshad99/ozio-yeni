<?php

function getCleanNumber($number): string
{
    $cleanNumber = '';
    preg_match_all('!\d+!', $number, $matches);
    $cleanNumber = implode('', $matches[0]);
    return $cleanNumber;
}
