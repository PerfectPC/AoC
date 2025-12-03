<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach ($input as $key=>$value) {
			$row[$key] = explode(" ",$value);
			foreach ($row[$key] as $pos=>$word) {
				$temp = str_split($word);
				sort ($temp);
				$row[$key][$pos] = implode("",$temp);
			}
			if(count($row[$key])==count(array_unique($row[$key]))) $valid++;
		}
	echo $valid."\n\r";
?>