<?php
require_once("ordinal_numbers.php");
require_once(dirname(__FILE__) . '/../utils/day_of_week.php');

$months_numbers = array(
    '01' => 'кхолламан',
    '02' => 'чиллин',
    '03' => 'бекарг',
    '04' => 'оханан',
    '05' => 'хӀутосург',
    '06' => 'асаран',
    '07' => 'мангалан',
    '08' => 'хьаьттан',
    '09' => 'товбецан',
    '10' => 'эсаран',
    '11' => 'лахьанан',
    '12' => 'гӀуран'
);
$months_names = array(
    'январь' => '01',
    'февраль' => '02',
    'март' => '03',
    'апрель' => '04',
    'май' => '05',
    'июнь' => '06',
    'июль' => '07',
    'август' => '08',
    'сентябрь' => '09',
    'октябрь' => '10',
    'ноябрь' => '11',
    'декабрь' => '12',
    'января' => '01',
    'февраля' => '02',
    'марта' => '03',
    'апреля' => '04',
    'мая' => '05',
    'июня' => '06',
    'июля' => '07',
    'августа' => '08',
    'сентября' => '09',
    'октября' => '10',
    'ноября' => '11',
    'декабря' => '12'
);

function date_to_text($date) {
    global $months_numbers;
    global $months_names;
    
    $dateRegex = '/^(0[1-9]|[12][0-9]|3[01])[.\/-](0[1-9]|1[0-2])[.\/-](\d{1,4})$/';
    $dayWithMonthRegex = '/^(\d{1,2})\s*(январ[яь]|феврал[яь]|март[а]*|апрел[яь]|ма[йя]|июн[яь]|июл[яь]|август[а]*|сентябр[яь]|октябр[яь]|ноябр[яь]|декабр[яь])/u';

    // "12.03.2024 - ши эзар ткъе доьалгӀачу шеран март беттан шийттталгӀа де";
    // "14 сентября - товбецан 14 де";

    $result = "";

    if (preg_match($dateRegex, $date, $matches)) {
        $day = intval($matches[1]);
        $month = $matches[2];
        $year = intval($matches[3]);
        
        $year_text = ordinal_numbers($year);
        if( strpos($year_text, 'эзарлагӀа') !== false ) {
            $year_text = rtrim($year_text, 'а');
        }
        $result = $year_text . 'чу' . ' шеран ' . $months_numbers[$month] . ' беттан ' . ordinal_numbers($day) . ' де, ' . day_of_week("$year-$month-$day");
    } elseif (preg_match($dayWithMonthRegex, $date, $matches)) {
        $day = intval($matches[1]);
        $month = mb_strtolower($matches[2], 'UTF-8');
        $result = $months_numbers[$months_names[$month]] . ' беттан ' . ordinal_numbers($day) . ' де';
    }

    return $result;

}
?>