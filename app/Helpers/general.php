<?php

use Illuminate\Support\Facades\Route;

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

if (!function_exists('isActiveParent')) {
    function isActiveParent($children, $output = 'here show')
    {
        foreach ($children as $child) {
            if (Route::currentRouteName() == $child['url']) {
                return $output;
            }
        }

        return '';
    }
}
