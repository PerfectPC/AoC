<?php
	$sum=0;
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
	$input = str_split($input[0]);
	foreach ($input as $key=>$value) {
		if (isset($input[$key+1])) {
			if ($input[$key]==$input[$key+1]) $sum+=$value;
		}
		else if ($input[$key]==$input[0]) $sum+=$value;
	}
	echo $sum."\n\r";
?>