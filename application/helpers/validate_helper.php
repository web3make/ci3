<?php

/**
 * Метод обработки вводимых данных из форм
 */
function validate ($data)
{
    foreach ($data as $key => $i) {
        
        if (is_numeric($i))
            $data[$key] = (int) $i;
        else
            $data[$key] = mysql_real_escape_string((trim($i)));
    }
    return $data;
}