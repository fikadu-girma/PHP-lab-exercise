<?php
$string = "Hello, this is a PHP test";

if (str_starts_with($string, "Hello")) {
	echo "The string starts with 'Hello'.\n";
} else {
	echo "The string does NOT start with 'Hello'.\n";
}

if (str_ends_with($string, "PHP")) {
	echo "The string ends with 'PHP'.\n";
} else {
	echo "The string does NOT end with 'PHP'.\n";
}
