<?php
function countWord($feeling)
{
	return str_word_count($feeling);
}
$feeling = "I am feeling bad today";
echo (str_word_count($feeling));
