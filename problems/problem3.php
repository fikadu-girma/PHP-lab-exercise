<?php
$string = "Learning PHP is interesting";
$words = str_word_count($string, 1);
$lengths = array_map('strlen', $words);
$maxLength = max($lengths);
$longestWord = $words[array_search($maxLength, $lengths)];
echo $longestWord;
?>