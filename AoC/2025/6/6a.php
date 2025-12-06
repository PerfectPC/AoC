<?php
	// error_reporting(E_ERROR | E_PARSE);
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach ($input as $key=>$value) {
			$value = trim(preg_replace('/\s\s+/', ' ',$value)," ");
			$matrix[] = explode(" ",$value);
		}
		array_unshift($matrix, null);
		$matrix = call_user_func_array('array_map', $matrix);
		$matrix = array_map('array_reverse', $matrix);
		foreach ($matrix as $key=>$value) {
			$value = array_reverse($value);
			$op = array_pop($value);
			switch ($op) {
				case "+": $result[$key] = array_sum($value); break;
				case "*": $result[$key] = array_product($value); break;
			}
		}
	// print_r($result);
	echo (array_sum($result))."\n\r";
?>