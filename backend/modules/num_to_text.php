<?php

$ed = array('ноль', 'цхьаъ', 'шиъ', 'кхоъ', 'диъ', 'пхиъ', 'йалх', 'ворхӀ', 'бархӀ', 'исс', 'итт', 'цхьайтта', 'шийтта', 'кхойтта', 'дейтта', 'пхийтта', 'йалхитта', 'вуьрхӀитта', 'берхӀитта', 'ткъоьсна', 'ткъа');

$st = array(
    '1' => 'цхьа бӀе',
    '2' => 'ши бӀе',
    '3' => 'кхо бӀе',
    '4' => 'диъ бӀе',
    '5' => 'пхи бӀе',
    '6' => 'йалх бӀе',
    '7' => 'ворхӀ бӀе',
    '8' => 'бархӀ бӀе',
    '9' => 'исс бӀе'
);

$order = array('эзар', 'миллион', 'миллиард', 'триллион');

function num20_40($number) {
    global $ed;
    $num = $number - 20;
    if ($number == 40) {
        $name = "шовзткъа";
    } else {
        $name = "ткъе " . $ed[$num];
    }
    return $name;
}

function num40_60($number) {
    global $ed;
    $num = $number - 40;
    if ($number == 60) {
        $name = "кхузткъа";
    } else {
        $name = "шовзткъе " . $ed[$num];
    }
    return $name;
}

function num60_80($number) {
    global $ed;
    $num = $number - 60;
    if ($number == 80) {
        $name = "доьзткъа";
    } else {
        $name = "кхузткъе " . $ed[$num];
    }
    return $name;
}

function num80_100($number) {
    global $ed;
    $num = $number - 80;
    if ($number == 100) {
        $name = "бӀе";
    } else {
        $name = "доьзткъе " . $ed[$num];
    }
    return $name;
}

function num_dst($number) {
    global $ed;
    if ($number >= 0 && $number <= 20) {
        return $ed[$number];
    } elseif ($number > 20 && $number <= 40) {
        return num20_40($number);
    } elseif ($number > 40 && $number <= 60) {
        return num40_60($number);
    } elseif ($number > 60 && $number <= 80) {
        return num60_80($number);
    } elseif ($number > 80 && $number <= 100) {
        return num80_100($number);
    }
}

function num_stn($number) {
    global $st, $ed;
    $num = strval($number);
    $name_st = $st[$num[0]];
    $name_ds = ltrim(substr($num, 1), '0');
    $name = '';
    if ($name_ds == '') {
        $name = $name_st;
    } else {
        $name = $name_st . ' ' . num_dst(intval($name_ds));
    }
    return $name;
}

function num_tsch($number) {
    global $ed, $order;
    $num = strval($number);
    $len_num = strlen($num);
    if ($len_num == 4) {
        $name_1 = $ed[intval($num[0])];
    } elseif ($len_num == 5) {
        $name_1 = num_dst(intval(substr($num, 0, 2)));
    } elseif ($len_num == 6) {
        $name_1 = num_stn(intval(substr($num, 0, 3)));
    }

    if (strpos($name_1, 'ъ') !== false && strpos($name_1, 'диъ') === false) {
        $name_1 = rtrim($name_1, 'ъ');
    }
    $name_2 = ltrim(substr($num, -3), '0');
    $name = $name_1 . ' ' . $order[0];
    if ($name_2 != '') {
        $name_2 = intval($name_2);
        if ($name_2 > 0 && $name_2 <= 100) {
            $name .= ' ' . num_dst($name_2);
        } elseif ($name_2 > 100 && $name_2 < 1000) {
            $name .= ' ' . num_stn($name_2);
        }
    }
    return $name;
}

function num_mln($number) {
    global $ed, $order;
    $num = strval($number);
    $len_num = strlen($num);
    if ($len_num == 7) {
        $name_1 = $ed[intval($num[0])];
    } elseif ($len_num == 8) {
        $name_1 = num_dst(intval(substr($num, 0, 2)));
    } elseif ($len_num == 9) {
        $name_1 = num_stn(intval(substr($num, 0, 3)));
    }

    if (strpos($name_1, 'ъ') !== false && strpos($name_1, 'диъ') === false) {
        $name_1 = rtrim($name_1, 'ъ');
    }
    $name_2 = ltrim(substr($num, -6), '0');
    $name = $name_1 . ' ' . $order[1];
    if ($name_2 != '') {
        $name_2 = intval($name_2);
        if ($name_2 > 0 && $name_2 <= 100) {
            $name .= ' ' . num_dst($name_2);
        } elseif ($name_2 > 100 && $name_2 < 1000) {
            $name .= ' ' . num_stn($name_2);
        } elseif ($name_2 >= 1000 && $name_2 < 1000000) {
            $name .= ' ' . num_tsch($name_2);
        }
    }
    return $name;
}

function num_mlrd($number) {
    global $ed, $order;
    $num = strval($number);
    $len_num = strlen($num);
    if ($len_num == 10) {
        $name_1 = $ed[intval($num[0])];
    } elseif ($len_num == 11) {
        $name_1 = num_dst(intval(substr($num, 0, 2)));
    } elseif ($len_num == 12) {
        $name_1 = num_stn(intval(substr($num, 0, 3)));
    }

    if (strpos($name_1, 'ъ') !== false && strpos($name_1, 'диъ') === false) {
        $name_1 = rtrim($name_1, 'ъ');
    }
    $name_2 = ltrim(substr($num, -9), '0');
    $name = $name_1 . ' ' . $order[2];
    if ($name_2 != '') {
        $name_2 = intval($name_2);
        if ($name_2 > 0 && $name_2 <= 100) {
            $name .= ' ' . num_dst($name_2);
        } elseif ($name_2 > 100 && $name_2 < 1000) {
            $name .= ' ' . num_stn($name_2);
        } elseif ($name_2 >= 1000 && $name_2 < 1000000) {
            $name .= ' ' . num_tsch($name_2);
        } elseif ($name_2 >= 1000000 && $name_2 < 1000000000) {
            $name .= ' ' . num_mln($name_2);
        }
    }
    return $name;
}

function num_trln($number) {
    global $ed, $order;
    $num = strval($number);
    $len_num = strlen($num);
    if ($len_num == 13) {
        $name_1 = $ed[intval($num[0])];
    } elseif ($len_num == 14) {
        $name_1 = num_dst(intval(substr($num, 0, 2)));
    } elseif ($len_num == 15) {
        $name_1 = num_stn(intval(substr($num, 0, 3)));
    }

    if (strpos($name_1, 'ъ') !== false && strpos($name_1, 'диъ') === false) {
        $name_1 = rtrim($name_1, 'ъ');
    }
    $name_2 = ltrim(substr($num, -12), '0');
    $name = $name_1 . ' ' . $order[3];
    if ($name_2 != '') {
        $name_2 = intval($name_2);
        if ($name_2 > 0 && $name_2 <= 100) {
            $name .= ' ' . num_dst($name_2);
        } elseif ($name_2 > 100 && $name_2 < 1000) {
            $name .= ' ' . num_stn($name_2);
        } elseif ($name_2 >= 1000 && $name_2 < 1000000) {
            $name .= ' ' . num_tsch($name_2);
        } elseif ($name_2 >= 1000000 && $name_2 < 1000000000) {
            $name .= ' ' . num_mln($name_2);
        } elseif ($name_2 >= 1000000000 && $name_2 < 1000000000000) {
            $name .= ' ' . num_mlrd($name_2);
        }
    }
    return $name;
}

function num_to_text($number) {
    if ($number >= 0 && $number < 100) {
        return num_dst($number);
    } elseif ($number >= 100 && $number < 1000) {
        return num_stn($number);
    } elseif ($number >= 1000 && $number < 1000000) {
        return num_tsch($number);
    } elseif ($number >= 1000000 && $number < 1000000000) {
        return num_mln($number);
    } elseif ($number >= 1000000000 && $number < 1000000000000) {
        return num_mlrd($number);
    } elseif ($number >= 1000000000000 && $number < 1000000000000000) {
        return num_trln($number);
    }
}

// echo num_to_text(4000);

?>
