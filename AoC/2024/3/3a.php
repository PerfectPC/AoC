<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file_get_contents("input.txt",FILE_IGNORE_NEW_LINES);
	preg_match_all("/mul\([0-9]{1,3}\,[0-9]{1,3}\)/",$input,$matches);
	foreach ($matches[0] as $value) {
		preg_match_all("/[0-9]+/",$value,$numbers);
		$sum += ($numbers[0][0]*$numbers[0][1]);
	}
	echo $sum."\n";
?>