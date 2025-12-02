<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach($input as $key=>$value) {
			$report = explode(" ",$value);
			$sign[0] = $report[1]<=>$report[0];
			$count = count($report);
			$safe[$key]=1;
			for($i=1; $i<$count; $i++) {
				$sign[$i] = $report[$i]<=>$report[$i-1];
				if($sign[$i]==$sign[0] && abs($report[$i]-$report[$i-1])<4) {} else $safe[$key]=0;
			}
		}
	echo array_sum($safe)."\n";
?>