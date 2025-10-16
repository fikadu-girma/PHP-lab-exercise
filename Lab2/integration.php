<?php
for ($i = 1; $i <= 50; $i++) {
	$result = "List: " . $i;

	if ($i % 3 == 0 && $i % 5 == 0) {
		$result .= " FizzBuzz";
	} elseif ($i % 3 == 0) {
		$result .= " Fizz";
	} elseif ($i % 5 == 0) {
		$result .= " Buzz";
	}

	echo $result . "<br>";
}