<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
	$instr = explode(", ", $input[0]);
	$dir = "N";
	$path[0][0]=0;
	$path[0][1]=0;
	foreach ($instr as $key=>$value) {
		switch ($dir) {
			case "N":
				$path[$key+1][0] = $path[$key][0];
				if (substr($value,0,1)=="L") {$path[$key+1][1]=$path[$key][1]-substr($value,1); $dir="W";}
				if (substr($value,0,1)=="R") {$path[$key+1][1]=$path[$key][1]+substr($value,1); $dir="E";}
				break;
			case "E":
				if (substr($value,0,1)=="R") {$path[$key+1][0]=$path[$key][0]-substr($value,1); $dir="S";}
				if (substr($value,0,1)=="L") {$path[$key+1][0]=$path[$key][0]+substr($value,1); $dir="N";}
				$path[$key+1][1] = $path[$key][1];
				break;
			case "S":
				$path[$key+1][0] = $path[$key][0];
				if (substr($value,0,1)=="R") {$path[$key+1][1]=$path[$key][1]-substr($value,1); $dir="W";}
				if (substr($value,0,1)=="L") {$path[$key+1][1]=$path[$key][1]+substr($value,1); $dir="E";}
				break;
			case "W":
				if (substr($value,0,1)=="L") {$path[$key+1][0]=$path[$key][0]-substr($value,1); $dir="S";}
				if (substr($value,0,1)=="R") {$path[$key+1][0]=$path[$key][0]+substr($value,1); $dir="N";}
				$path[$key+1][1] = $path[$key][1];
				break;
		}
		// if (array_search($path[$key+1],$path)<$key+1) break;
	}
	// print_r($path);
	$last=array_key_last($path);
	echo abs($path[$last][0])+abs($path[$last][1])."\n\r";
?>