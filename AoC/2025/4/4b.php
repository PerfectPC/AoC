<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
	$run=1;
	function checkgrid() {
		global $lines,$x,$y,$rolls,$run;
		$count=0;
		if (isset($lines[$y-1][$x-1]) && $lines[$y-1][$x-1]=="@") $count++;
		if (isset($lines[$y-1][$x]) && $lines[$y-1][$x]=="@") $count++;
		if (isset($lines[$y-1][$x+1]) && $lines[$y-1][$x+1]=="@") $count++;
		if (isset($lines[$y][$x-1]) && $lines[$y][$x-1]=="@") $count++;
		if (isset($lines[$y][$x+1]) && $lines[$y][$x+1]=="@") $count++;
		if (isset($lines[$y+1][$x-1]) && $lines[$y+1][$x-1]=="@") $count++;
		if (isset($lines[$y+1][$x]) && $lines[$y+1][$x]=="@") $count++;
		if (isset($lines[$y+1][$x+1]) && $lines[$y+1][$x+1]=="@") $count++;
		if ($count<4) {
			$rolls[]="[$y][$x]";
			$lines[$y][$x]="x";
			$run=1;
		}
	}
	foreach ($input as $key=>$value) {
		$lines[$key] = str_split($value);
	}
	while($run) {
		$run=0;
		foreach ($lines as $y=>$line) {
			foreach ($line as $x=>$content) {
				if ($content=="@") checkgrid();
				if ($content=="x") $lines[$y][$x]=".";
				// echo $lines[$y][$x];
			}
			// echo "\n\r";
		}
		// echo "\n\r";
	}
	// print_r($rolls);
	echo count($rolls)."\n\r";
?>