<?php

function query_in_article($word, $db) {
    $response['words'] = array();
    $pattern = "( |>)($word)(;|,|<| )";
    // $pattern = "( |[^А-я0-9Ӏ])($word)( |[^А-я0-9Ӏ])";
    $query = "SELECT id,word,article,article_for_search FROM orthographic_dictionary WHERE article_for_search REGEXP '$pattern' LIMIT 100";
    $result = mysqli_query($db,$query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $article = $row['article_for_search'];
        if (preg_match_all("/$pattern/", $article, $matches)) {
            $row['pattern'] = $matches;
        }

        $row['notMainWord'] = $word;
        $response['words'][] = $row;
    }

    return $response['words'];
}