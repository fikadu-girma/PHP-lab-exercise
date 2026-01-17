<?php
$sentence = "PHP is great and PHP is fun";
$sentence = strtolower($sentence);
$words = str_word_count($sentence, 1);
$wordCounts = array_count_values($words);
print_r($wordCounts);
?>