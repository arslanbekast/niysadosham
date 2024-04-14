<?php

require_once(dirname(__FILE__) . '/../utils/levenshtein_distance.php');
require_once(dirname(__FILE__) . '/../utils/query_in_article.php');
require_once(dirname(__FILE__) . '/../utils/words_with_diphthongs.php');

function suggested_words($word, $db) {

    $response['suggestedWords'] = array();
    $added_words_id = array();

    // Поиск слова с дифтонгами
    $words_with_diphthongs = words_with_diphthongs($word);

    foreach ($words_with_diphthongs as $word_with_diphthongs) {

        $query = "SELECT id,word,article FROM orthographic_dictionary WHERE word_for_search='$word_with_diphthongs'";
        $result = mysqli_query($db,$query);

        while ($row = mysqli_fetch_assoc($result)) {
            if (!in_array($row['id'], $added_words_id)) {
                $response['suggestedWords'][] = $row;
                $added_words_id[] = $row['id'];
            }
        }

        // Поиск слова с дифтонгами в словарных статьях
        if (mb_strlen($word_with_diphthongs) > 1) {
            $response['suggestedWords'] = array_merge($response['suggestedWords'], query_in_article($word_with_diphthongs, $db));
        }
        
    }

    
    

    // Поиск похожих слов по формуле Ливенштейна
    $first_letter = mb_substr($word, 0, 1);
    $query = "SELECT id,word,article,word_for_search FROM orthographic_dictionary WHERE word_for_search LIKE '$first_letter%'";
	$result = mysqli_query($db,$query);

    while ($row = mysqli_fetch_assoc($result)) {
        $word_for_search = $row['word_for_search'];
        $levenshtein_distance = levenshtein_distance($word, $word_for_search);
        
        if ($levenshtein_distance > 0 && $levenshtein_distance <= 2) {
            
            if (!in_array($row['id'], $added_words_id)) {
                $response['suggestedWords'][] = $row;
                $added_words_id[] = $row['id'];
            }
        }
    }

    return $response['suggestedWords'];

}