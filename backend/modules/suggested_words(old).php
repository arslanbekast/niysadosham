<?php

function suggested_words($word, $db) {

    $response['suggestedWords'] = array();
    $wordsId = array();
    do {
        $word = mb_substr($word, 0, -1);
        $query = "SELECT id,word,article FROM orthographic_dictionary WHERE word_for_search LIKE '$word%' LIMIT 7";
	    $result = mysqli_query($db,$query);
        
        while ($row = mysqli_fetch_assoc($result)) {
            if (!in_array($row['id'], $wordsId)) {
                $response['suggestedWords'][] = $row;
                $wordsId[] = $row['id'];
            }   
        }

        if (count($response['suggestedWords']) >= 7) {
            break;
        }

    } while(mb_strlen($word) > 1);


    return $response['suggestedWords'];

}