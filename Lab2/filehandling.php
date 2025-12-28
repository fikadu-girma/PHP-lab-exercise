<?php

$filename = "example.txt";
$text = "Hello, this is a file handling example in PHP.\n";

file_put_contents($filename, $text);

$moreText = "This line was appended later.\n";
file_put_contents($filename, $moreText, FILE_APPEND);

if (file_exists($filename)) {
    $contents = file_get_contents($filename);
    echo nl2br($contents);
} else {
    echo "File not found.";
}

?>
