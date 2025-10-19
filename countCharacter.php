<?php
function countTotalCharacters($str)
{
	return strlen($str);
}

$string = "PHP is a popular general-purpose scripting language.";
echo countTotalCharacters($string);
