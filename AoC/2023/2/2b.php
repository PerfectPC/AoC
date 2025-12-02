<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("test.txt",FILE_IGNORE_NEW_LINES);
	foreach ($input as $key=>$line) {
		$red[$key]=0; $green[$key]=0; $blue[$key]=0;
		$line = explode(": ",$line);
		$game = explode("; ",$line[1]);
		foreach ($game as $subset) {
			$colour = explode(", ",$subset);
			foreach ($colour as $item) {
				$set = explode(" ",$item);
				switch ($set[1]) {
					case "red": if($set[0]>$red[$key]) $red[$key]=$set[0]; break;
					case "green": if($set[0]>$green[$key]) $green[$key]=$set[0]; break;
					case "blue": if($set[0]>$blue[$key]) $blue[$key]=$set[0]; break;
				}
			}
		}
		$power[$key]=$red[$key]*$green[$key]*$blue[$key];
	}
	echo array_sum($power)."\n";
?>