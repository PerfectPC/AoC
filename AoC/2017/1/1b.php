<?php
	$sum=0;
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
	$input = str_split($input[0]);
	$count = count($input)/2;
	foreach ($input as $key=>$value) {
		if (isset($input[$key+$count])) {
			if ($input[$key]==$input[$key+$count]) $sum+=$value;
		}
		elseif (isset($input[$key-$count])) {
			if ($input[$key]==$input[$key-$count]) $sum+=$value;
		}
		else { echo "break"; break; }
	}
	echo $sum."\n\r";
?>