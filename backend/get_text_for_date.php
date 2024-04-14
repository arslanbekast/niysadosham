<?php
require_once("modules/date_to_text.php");
require_once("utils/mb_ucfirst.php");
require_once("utils/is_date.php");

if (isset($_POST['date']) && !empty('date')) {

    $date = $_POST['date'];

    $response['text'] = array();
    $response['errors'] = array();

    if (is_date($date)) {
        $response['text'][] = mb_ucfirst(date_to_text($date));
    } else {
        $response['errors'][] = 'Терахь нийса дац.';
    }

    echo json_encode($response);
}

?>
