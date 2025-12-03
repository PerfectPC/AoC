<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
	$run=1;
	$pos=0;
	$steps=0;
	function jump() {
		global $run,$input,$pos,$steps;
		if (!isset($input[$pos+$input[$pos]])) $run=false;
		$input[$pos]++;
		$pos += $input[$pos]-1;
		$steps++;
	}
	while ($run) jump();
	// print_r ($input);
	echo $steps."\n\r";
?>