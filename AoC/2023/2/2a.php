<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
	foreach ($input as $key=>$line) {
		$possible = 1;
		$line = explode(": ",$line);
		$game = explode("; ",$line[1]);
		foreach ($game as $subset) {
			$colour = explode(", ",$subset);
			foreach ($colour as $item) {
				$set = explode(" ",$item);
				switch ($set[1]) {
					case "red": if($set[0]>12) $possible = 0; break;
					case "green": if($set[0]>13) $possible = 0; break;
					case "blue": if($set[0]>14) $possible = 0; break;
				}
			}
		}
		if ($possible==1) $sum+=$key+1;
	}
	echo $sum."\n";
?>