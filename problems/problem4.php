<?php
$word = "Hello";
$word = strtolower($word);
$vowelCount = preg_match_all("/[aeiou]/", $word);
$letterCount = preg_match_all("/[a-z]/", $word);
$consonantCount = $letterCount - $vowelCount;
echo "Vowels: $vowelCount, Consonants: $consonantCount";
?>
