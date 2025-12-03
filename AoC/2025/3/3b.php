<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
	function findbatt() {
		global $num,$prev,$key,$value,$jolt;
		$batt = substr($value,$prev+1,strlen($value)-$num-$prev);
		$batt = str_split($batt);
		arsort($batt);
		$jolt[$key] = $jolt[$key].array_first($batt);
		$prev += array_key_first($batt)+1;
		$num--;
	}
	foreach ($input as $key=>$value) {
		$num=12;
		$prev=-1;
		$jolt[$key]="";
		while($num>0) findbatt();
	}
	echo array_sum($jolt)."\n\r";
?>