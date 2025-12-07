<?php
	// $time = hrtime(true);
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach ($input as $key=>$value) {
			$value = str_replace(".","0",$value);
			$line[$key] = str_split($value);
			foreach ($line[$key] as $a=>$b) {
				if (isset($line[$key-1][$a]) && $line[$key][$a]==0 && $line[$key-1][$a]=="S") $line[$key][$a]=1;
				if (isset($line[$key-1][$a]) && $line[$key][$a]!="^" && is_numeric($line[$key-1][$a])) $line[$key][$a]+=$line[$key-1][$a];
				if (isset($line[$key-1][$a]) && $line[$key][$a]=="^" && $line[$key-1][$a]>=1) {
					$line[$key][$a-1]+=$line[$key-1][$a];
					$line[$key][$a+1]+=$line[$key-1][$a];
				}
			}
		}
		// foreach ($line as $c) {
			// echo implode(" ",$c)."\n\r";
		// }
	// print_r($line);
	echo (array_sum(array_last($line)))."\n\r";
	// echo (hrtime(true)-$time)/1000000000;

?>
