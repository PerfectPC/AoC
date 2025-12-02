<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach ($input as $key=>$line) {
			preg_match_all ("(\d)",$line,$result);
			$value[] = reset($result[0]).end($result[0]);
		}
	echo array_sum($value)."\n";
?>