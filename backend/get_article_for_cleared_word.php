<?php
include ("settings/db.php");
require_once("utils/clear.php");

if (isset($_POST['clearedWord']) && !empty('clearedWord')) {
    $clearedWord = clear($_POST['clearedWord']);
    $clearedWord = mysqli_real_escape_string($db, $clearedWord);
    $response['words'] = array();
    $response['errors'] = array();
    
    // $query = "SELECT id,word,article FROM orthographic_dictionary WHERE word_for_search REGEXP '^$clearedWord([0-9])*$'";
    $query = "SELECT id,word,article FROM orthographic_dictionary WHERE word_for_search='$clearedWord'";
	$result = mysqli_query($db,$query);
    if ($result !== FALSE) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response['words'][] = $row;
        }
    } else {
        $response['errors'][] = 'Цхьа гӀалат дина.';
    }

    if (count($response['words']) === 0) {
        $response['errors'][] = 'Идош дошам тӀехь кара ца до.';
    }
    
    echo json_encode($response);
}