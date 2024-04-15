<?php

include ("settings/db.php");
require_once("utils/clear.php");

if (isset($_POST['letter'])) {

    $response['words'] = array();
    $response['errors'] = array();
    $letter = clear($_POST['letter']);
    $letter = mysqli_real_escape_string($db, $letter);
    
    $end_query = "";

    switch ($letter) {
        case 'а':
        case 'о':
        case 'у':
            $not_like = $letter . 'ь';
            $end_query = "AND word_for_search NOT LIKE '$not_like%'";
            break;
        case 'г':
        case 'п':
        case 'т':
        case 'ц':
        case 'ч':
            $not_like = $letter . 'Ӏ';
            $end_query = "AND word_for_search NOT LIKE '$not_like%'";
            break;
        case 'к':
            $not_like1 = $letter . 'х';
            $not_like2 = $letter . 'ъ';
            $not_like3 = $letter . 'Ӏ';
            $end_query = "AND word_for_search NOT LIKE '$not_like1%' AND word_for_search NOT LIKE '$not_like2%' AND word_for_search NOT LIKE '$not_like3%'";
            break;
        case 'х':
            $not_like1 = $letter . 'ь';
            $not_like2 = $letter . 'Ӏ';
            $end_query = "AND word_for_search NOT LIKE '$not_like1%' AND word_for_search NOT LIKE '$not_like2%'";
            break;
    }
    $query = "SELECT id, word FROM orthographic_dictionary WHERE word_for_search LIKE '$letter%' $end_query";
    
	$result = mysqli_query($db,$query);

    while ($row = mysqli_fetch_assoc($result)) {
        $response['words'][] = $row;
    }

    if (count($response['words']) === 0) {
        $response['errors'][] = 'Бази йуккъехь и элп хьалхара долуш дош дац.';
    }

    echo json_encode($response);



}

?>