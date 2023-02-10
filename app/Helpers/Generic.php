<?php

if (!function_exists('weiToMatic')) {
    function weiToMatic($weiAmount, $decimalPlaces = 18) {
        return bcdiv(bcmul($weiAmount, 1, $decimalPlaces), bcpow('10', '18', $decimalPlaces), $decimalPlaces);
    }
}

