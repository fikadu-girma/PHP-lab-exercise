<?php
function replaceWord($str)
{
	return str_replace("World", "PHP", $str);
}
$string = "Hello World";
echo replaceWord($string);
