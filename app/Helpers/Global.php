<?php

if (!function_exists('formatValue')) {
    function formatValue($val) {
        $valor = str_replace('.', '', $val);
        return $valor = str_replace(',', '.', $valor);
    }
}

