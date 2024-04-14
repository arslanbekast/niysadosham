<?php

function levenshtein_distance($str1, $str2) {
    $len1 = strlen($str1);
    $len2 = strlen($str2);
    
    // Создаем матрицу размером (len1 + 1) x (len2 + 1)
    $matrix = [];
    for ($i = 0; $i <= $len1; $i++) {
        $matrix[$i] = [];
        for ($j = 0; $j <= $len2; $j++) {
            $matrix[$i][$j] = 0;
        }
    }
    
    // Заполняем первую строку и первый столбец матрицы
    for ($i = 0; $i <= $len1; $i++) {
        $matrix[$i][0] = $i;
    }
    for ($j = 0; $j <= $len2; $j++) {
        $matrix[0][$j] = $j;
    }
    
    // Заполняем остальные ячейки матрицы
    for ($i = 1; $i <= $len1; $i++) {
        for ($j = 1; $j <= $len2; $j++) {
            $cost = ($str1[$i - 1] != $str2[$j - 1]) ? 1 : 0;
            $matrix[$i][$j] = min(
                $matrix[$i - 1][$j] + 1,           // удаление
                $matrix[$i][$j - 1] + 1,           // вставка
                $matrix[$i - 1][$j - 1] + $cost   // замена
            );
        }
    }
    
    // Возвращаем результат - расстояние Левенштейна между двумя строками
    return $matrix[$len1][$len2];
}

// Пример использования функции
// $str1 = "абаде";
// $str2 = "абаде";
// echo "Расстояние Левенштейна между \"$str1\" и \"$str2\": " . levenshtein_distance($str1, $str2);



?>