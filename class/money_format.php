<?php
function number_format_unchanged_precision($number, $dec_point = '.', $thousands_sep = ',')
{
    if ($dec_point == $thousands_sep) {
        trigger_error('2 parameters for ' . __METHOD__ . '() have the same value, that is "' . $dec_point . '" for $dec_point and $thousands_sep', E_USER_WARNING);
        // It corresponds "PHP Warning:  Wrong parameter count for number_format()", which occurs when you use $dec_point without $thousands_sep to number_format().
    }
    if (preg_match('{\.\d+}', $number, $matches) === 1) {
        $decimals = strlen($matches[0]) - 1;
    } else {
        $decimals = 0;
    }
    return number_format($number, $decimals, $dec_point, $thousands_sep);
}
