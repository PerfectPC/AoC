<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach ($input as $key=>$value) {
			$row[$key] = explode("	",$value);
			sort ($row[$key]);
			$diff[$key] = array_last($row[$key])-array_first($row[$key]);
		}
	// print_r($diff);
	echo array_sum($diff)."\n\r";
?>