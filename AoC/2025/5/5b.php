<?php
	// error_reporting(E_ERROR | E_PARSE);
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
	$split=false;
		foreach ($input as $key=>$value) {
			if ($split) $ids[]=$value;
			else $ranges[]=$value;
			if ($value=="") $split=true;
		}
		unset ($ranges[array_key_last($ranges)]);
		natsort($ranges);
		$ranges = array_values($ranges);
		$run=1;
		while ($run) {
			$run=0;
			foreach ($ranges as $key=>$range) {
				if (isset($ranges[$key-1])) {
					$split=strpos($ranges[$key-1],"-");
					$exploded = explode("-",$range);
					$test = substr($ranges[$key-1],$split+1);
					if ($exploded[1]<$exploded[0]) unset ($ranges[$key]);
					elseif ($exploded[0]<=$test) {
						$exploded[0]=$test+1;
						$ranges[$key]=implode("-",$exploded);
						$run=1;
					}
				}
			}
			natsort($ranges);
			$ranges = array_values($ranges);
		}
		foreach ($ranges as $key=>$range) {
			$exploded = explode("-",$range);
			$count[] = $exploded[1]-$exploded[0]+1>0 ? $exploded[1]-$exploded[0]+1 : 0;
		}
	// print_r($total);
	echo (array_sum($count))."\n\r";
?>