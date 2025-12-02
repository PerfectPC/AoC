<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("test.txt",FILE_IGNORE_NEW_LINES);
	$divider = array_search("",$input);
	foreach ($input as $key=>$value) {
		if ($key<$divider) $rules[]=$value;
		elseif ($key>$divider) $updates[]=explode(",",$value);
	}
	sort ($rules);
	$rules = implode(" ",$rules);
	foreach ($updates as $update) {
		foreach ($update as $page) {
			preg_match_all("/$page\|[0-9]+/",$rules,$rule);
			print_r($rule[0]);
		}
	}
	// print_r($rule);
	// echo $sum."\n";
?>