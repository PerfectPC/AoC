<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach ($input as $key=>$value) {
			$line = explode("   ",$value);
			$a[] = $line[0];
			$b[] = $line[1];
		}
	$c = array_count_values($b);
	foreach ($a as $key=>$value) {
		$d[] = $c[$value]*$a[$key];
	}
	echo (array_sum($d))."\n";
?>