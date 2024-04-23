<?php
ini_set('max_execution_time', '3600');
$start = microtime(true);
include ("backend/settings/db.php");
// set_time_limit(36000);
$dict = 'dict.txt';
$file_array = file($dict); // Считывание файла в массив $file_array

$letters_for_replace = ['ā'=>'а', 'â'=>'а', 'ē'=>'е', 'ō'=>'о', 'ȳ'=>'у', 'э̄'=>'э'];
for ($i = 0; $i < count($file_array); $i++) { 
    list($word,$article) = explode('|', $file_array[$i]);
    $word = trim($word);
    $article = trim($article);
    
    $word_for_search = preg_replace('/[0-9]/', '', $word);
    $article_for_search = $article;
    foreach($letters_for_replace as $key => $value) {
      $word_for_search = str_replace($key,$value,$word_for_search);
      $article_for_search = str_replace($key,$value,$article_for_search);
      // if (stripos($word, $key) != false) {
      //   $word_for_search = str_replace($key,$value,$word_for_search);
      // }
      // if (stripos($article, $key) != false) {
      //   $article_for_search = str_replace($key,$value,$article_for_search);
      // }
      
      
    }
    
    mysqli_query($db, "INSERT INTO orthographic_dictionary (word,article,word_for_search,article_for_search) VALUES ('$word', '$article', '$word_for_search', '$article_for_search')"); 
  }
  echo 'Время выполнения скрипта: '.round(microtime(true) - $start, 4).' сек.';
?>