<?php
function extractSubString($str)
{
	return substr($str, 6, 3);
}
$string = "Hello PHP World";
echo extractSubString($string);
