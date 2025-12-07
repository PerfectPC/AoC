<?php
	$time = hrtime(true);
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
	$split=0;
		foreach ($input as $key=>$value) {
			$line[$key] = str_split($value);
			foreach ($line[$key] as $a=>$b) {
				if (isset($line[$key-1][$a]) && $line[$key][$a]=="." && ($line[$key-1][$a]=="|" || $line[$key-1][$a]=="S")) $line[$key][$a]="|";
				if (isset($line[$key-1][$a]) && $line[$key][$a]=="^" && $line[$key-1][$a]=="|") {
					$line[$key][$a-1]="|";
					$line[$key][$a+1]="|";
					$split++;
				}
			}
		}
		// foreach ($line as $c) {
			// echo implode($c)."\n\r";
		// }
	// print_r($line);
	echo ($split)."\n\r";
	// echo (hrtime(true)-$time)/1000000000;
?>