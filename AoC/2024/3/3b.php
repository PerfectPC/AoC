<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file_get_contents("input.txt",FILE_IGNORE_NEW_LINES);
	preg_match_all("/mul\([0-9]{1,3}\,[0-9]{1,3}\)|do\(\)|don\'t\(\)/",$input,$matches);
	$run=1;
	foreach ($matches[0] as $value) {
		if (substr($value,0,2)=="do") switch ($value) {
			case "do()" : $run=1; break;
			case "don't()" : $run=0; break;
		}
		else {
			if ($run==1) {
				preg_match_all("/[0-9]+/",$value,$numbers);
				$sum += ($numbers[0][0]*$numbers[0][1]);
			}
		}
	}
	echo $sum."\n";
?>