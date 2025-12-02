<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach($input as $key=>$value) {
			$report = explode(" ",$value);
			$count = count($report);
			for($j=0; $j<$count; $j++) {
				$temp = $report;
				array_splice($temp,$j,1);
				$sign[0] = $temp[1]<=>$temp[0];
				$safe[$key]=1;
				for($i=1; $i<$count-1; $i++) {
					$sign[$i] = $temp[$i]<=>$temp[$i-1];
					if($sign[$i]==$sign[0] && abs($temp[$i]-$temp[$i-1])<4) {} else $safe[$key]=0;
				}
				if ($safe[$key]==1) break(1);
			}
		}
	echo array_sum($safe)."\n";
?>