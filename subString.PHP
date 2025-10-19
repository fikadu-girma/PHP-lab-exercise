<?php
function subString($course, $find)
{
	return strpos($course, $find);
}
$course = "I love PHP programming";
$find = "PHP";
$result = subString($course, $find);
echo "The position of '$find' in '$course' is $result.";
