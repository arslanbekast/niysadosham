<?php

function words_with_diphthongs($word) {

    $words_array = array();
    $vowels = 'аоуеыэяёию';
    $consonants = 'йцкнгшщзхфвпрлджчсмтб';

    $diphthongs_array = array(
        "э"=>"иэ",
        "у"=>"уо",
        "о"=>"уо",
        "я"=>"йа",
        "ю"=>"йу",
        "ой"=>"ев",
        "оьй"=>"ев",
        "оьв"=>"ев",
        "хьой"=>"хьаьв",
        "Ӏой"=>"хьаьв",
        "хьоьй"=>"хьаьв",
        "Ӏоьй"=>"хьаьв",
        "хьоьв"=>"хьаьв",
        "Ӏоьв"=>"хьаьв",
    );

    $words_array[] = $word . 'н';
    $words_array[] = $word . 'а';


    if (preg_match_all('/[оуэюя]/ui', $word, $matches)) {
        $new_word = $word;
        foreach ($matches[0] as $value) {
            $match = mb_strtolower($value);
            $replacement = $diphthongs_array[$match];
            $new_word = str_replace($match, $replacement, $new_word);
        }
        $words_array[] = $new_word;
    }

    $pattern = "/[$consonants]е/ui";
    if (preg_match_all($pattern, $word, $matches)) {
        $new_word = $word;
        foreach ($matches[0] as $value) {
            $match = mb_strtolower($value);
            $replacement = str_replace('е', 'ие', $match);
            $new_word = str_replace($match, $replacement, $new_word);
        }
        $words_array[] = $new_word;
    }

    $pattern = '/^е|[аоуэяиюьъ]е/ui';
    if (preg_match_all($pattern, $word, $matches)) {
        
        $repl_arr = ["йе", "йиэ"];
        foreach ($repl_arr as $repl) {
            $new_word = $word;
            foreach ($matches[0] as $value) {
                $match = mb_strtolower($value);
                $replacement = str_replace('е', $repl, $match);
                $new_word = preg_replace("/$match/u", $replacement, $new_word, 1);
            }
            $words_array[] = $new_word;           
        }
    }

    $pattern = "/(ой|оьй|оьв)[$consonants]|(хьой|Ӏой|хьоьй|Ӏоьй|хьоьв|Ӏоьв)[$vowels]/ui";
    if (preg_match_all($pattern, $word, $matches)) {
        $new_word = $word;
        foreach ($matches[0] as $value) {
            $match = mb_strtolower($value);
            $match_without_end_letter = mb_substr($match, 0, -1);
            $replacement = str_replace($match_without_end_letter, $diphthongs_array[$match_without_end_letter], $match);
            $new_word = preg_replace("/$match/u", $replacement, $new_word, 1);
        }
        $words_array[] = $new_word;
    }

    

    return $words_array;

}

// words_with_diphthongs('епараепьеаъепр');