<?php
$string = "Level";
$cleaned = strtolower(preg_replace("/[^a-zA-Z]/", "", $string));
$isPalindrome = $cleaned === strrev($cleaned);
echo $isPalindrome ? "Palindrome" : "Not a palindrome";
?>