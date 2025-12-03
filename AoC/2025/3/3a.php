<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach ($input as $key=>$value) {
			$first = str_split($value);
			array_pop($first);
			arsort($first);
			$jolt[$key] = array_first($first);
			$last = str_split(substr($value,array_key_first($first)+1));
			arsort($last);
			$jolt[$key] = $jolt[$key].array_first($last);
		}
	// print_r($jolt);
	echo array_sum($jolt)."\n\r";
?>