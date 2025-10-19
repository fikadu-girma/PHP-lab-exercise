<?php
$sentence = "I love PHP and I love coding";
$words = explode(" ", strtolower($sentence));
$uniqueWords = array_unique($words);
$uniqueSentence = implode(" ", $uniqueWords);
echo $uniqueSentence;
?>