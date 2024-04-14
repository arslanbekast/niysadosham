<?php
// require_once("backend/modules/generate_similar_strings.php");
// $text = "Сегодня 14 март";
// $pattern = '/(\d{1,2})\s+(январ[яь]|феврал[яь]|март[а]*|апрел[яь]|ма[йя]|июн[яь]|июл[яь]|август[а]*|сентябр[яь]|октябр[яь]|ноябр[яь]|декабр[яь])/u';
// if (preg_match($pattern, $text, $matches)) {
//     $day = $matches[1];
//     $month = $matches[2];
//     echo "День: $day\n";
//     echo "Месяц: $month\n";
// } else {
//     echo "Дата не найдена.\n";
// }
$number_str = '0003';
if (preg_match('/0+/', $number_str, $matches)) {
    print_r($matches[0]);
}

echo intval('003');



?>