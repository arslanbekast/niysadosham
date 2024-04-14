<?php
require_once("num_to_text.php");

function ordinal_numbers($number) {
    // Функция num_to_text возвращает текстовое представление числа
    $num_txt = num_to_text($number);

    // Удаляем пробелы в начале и конце строки
    $num_txt = trim($num_txt);

    // Разбиваем строку на массив по пробелам
    $num_txt_list = explode(' ', $num_txt);

    // Получаем последний элемент массива
    $final_digit = end($num_txt_list);

    // Проверяем, какая цифра на конце и заменяем окончание на нужное
    switch ($final_digit) {
        case 'цхьаъ':
            $num_txt_list[count($num_txt_list) - 1] = 'цхьолгӀа';
            break;
        case 'шиъ':
            $num_txt_list[count($num_txt_list) - 1] = 'шолгӀа';
            break;
        case 'кхоъ':
            $num_txt_list[count($num_txt_list) - 1] = 'кхоалгӀа';
            break;
        case 'диъ':
            $num_txt_list[count($num_txt_list) - 1] = 'доьалгӀа';
            break;
        case 'пхиъ':
            $num_txt_list[count($num_txt_list) - 1] = 'пхоьалгӀа';
            break;
        case 'йалх':
            $num_txt_list[count($num_txt_list) - 1] = 'йалхалгӀа';
            break;
        case 'ворхӀ':
            $num_txt_list[count($num_txt_list) - 1] = 'ворхӀалгӀа';
            break;
        case 'бархӀ':
            $num_txt_list[count($num_txt_list) - 1] = 'бархӀалгӀа';
            break;
        case 'исс':
            $num_txt_list[count($num_txt_list) - 1] = 'иссалгӀа';
            break;
        case 'итт':
            $num_txt_list[count($num_txt_list) - 1] = 'итталгӀа';
            break;
        case 'цхьайтта':
        case 'шийтта':
        case 'кхойтта':
        case 'дейтта':
        case 'пхийтта':
        case 'йалхитта':
        case 'вуьрхӀитта':
        case 'берхӀитта':
        case 'ткъоьсна':
        case 'шовзткъа':
        case 'кхузткъа':
        case 'доьзткъа':
            $num_txt_list[count($num_txt_list) - 1] = $final_digit . 'лгӀа';
            break;
        case 'ткъа':
            $num_txt_list[count($num_txt_list) - 1] = 'ткъолгӀа';
            break;
        case 'эзар':
            $num_txt_list[count($num_txt_list) - 1] = 'эзарлагӀа';
            break;
        case 'бӀе':
            $num_txt_list[count($num_txt_list) - 1] = 'бӀолгӀа';
            break;
        // Добавьте остальные кейсы аналогично
    }

    // Если массив содержит только один элемент и это цифра 'цхьаъ', заменяем его
    if (count($num_txt_list) == 1 && $final_digit == 'цхьаъ') {
        $num_txt_list[0] = 'хьалхара';
    }

    // Преобразуем массив обратно в строку
    $ord_number = implode(' ', $num_txt_list);

    if ($ord_number == 'цхьа бӀолгӀа') {
        $ord_number = 'бӀолгӀа';
    }

    if ($ord_number == 'цхьа эзарлагӀа') {
        $ord_number = 'эзарлагӀа';
    }

    return $ord_number;
}

// Пример использования:
// echo ordinal_numbers(2024);

?>
