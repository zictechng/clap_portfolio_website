<?php

if (!function_exists('format_count')) {
    function format_count($number)
    {
        if ($number >= 1000) {
            return round($number / 1000, 1) . 'k+';
        }
        return $number;
    }
}
