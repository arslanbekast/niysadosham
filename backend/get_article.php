<?php
// header("Content-Type: application/json; charset=UTF-8");
// header("Content-Type: text/html; charset=utf-8");
include ("settings/db.php");
require_once("utils/clear.php");
require_once("utils/query_in_article.php");
require_once("modules/suggested_words.php");


if (isset($_POST['word']) && !empty('word')) {
    
    $response = array();
    $response['words'] = array();
    $response['suggestedWords'] = array();
    $response['startingWords'] = array();
    $response['errors'] = array();
    $word = clear($_POST['word']);
    
    $word = mysqli_real_escape_string($db, $word);
    // echo $word;

    // Поиск слова как есть
    $query = "SELECT id,word,article FROM orthographic_dictionary WHERE word_for_search='$word'";
	$result = mysqli_query($db,$query);

    while ($row = mysqli_fetch_assoc($result)) {
        $response['words'][] = $row;
    }

   
    if (mb_strlen($word) > 1) {
         // Поиск слова в словарных статьях
        $response['words'] = array_merge($response['words'], query_in_article($word, $db));

        // Поиск похожих слов
        $response['suggestedWords'] = suggested_words($word, $db);
    }
    
    
    

    // Поиск слов, начинающихся на введенные символы
    $query = "SELECT id,word,article FROM orthographic_dictionary WHERE LOWER(word_for_search) REGEXP '^$word.+' LIMIT 100";
	$result = mysqli_query($db,$query);

    while ($row = mysqli_fetch_assoc($result)) {
        $response['startingWords'][] = $row;
    }


    if ( count($response['words']) === 0 && count($response['suggestedWords']) === 0 && count($response['startingWords']) === 0 ) {
        $response['errors'][] = 'И дош дошам тӀехь кара ца до.';
    } 
    

    echo json_encode($response);
}
    
?>