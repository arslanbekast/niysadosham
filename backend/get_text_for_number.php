<?php

require_once("modules/num_to_text.php");
require_once("modules/ordinal_numbers.php");
require_once("utils/mb_ucfirst.php");

if (isset($_POST['number']) && !empty('number')) {

    $number_str = $_POST['number'];
    $zeros_str = '';

    if (preg_match('/^0+/', $number_str, $matches)) {
        $zeros_array = str_split($matches[0]);
        foreach($zeros_array as $zero) {
            $zeros_str .= 'ноль ';
        }
    }

    $number = intval($number_str);

    $response['text'] = array();
    $response['errors'] = array();

    $num_to_text_str = $zeros_str;
    $ordinal_numbers_str = $zeros_str;
    if ($number > 0) {
        $num_to_text_str .= num_to_text($number);
        $ordinal_numbers_str .= ordinal_numbers($number);
    }

    $response['text'][] = mb_ucfirst($num_to_text_str);
    
    if ($number < 1000000) {
        $response['text'][] = mb_ucfirst($ordinal_numbers_str);
    }
    

    if ($number >= 1000000000000000) {
        $response['errors'][] = 'Терахь дукха доккха ду.';
    }

    echo json_encode($response);
}

?>