<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach ($input as $key=>$value) {
			$row[$key] = explode("	",$value);
			$count = count($row[$key]);
			for ($i=0;$i<=$count-1;$i++) {
				for ($j=0;$j<=$count-1;$j++) {
					if ($i<>$j && is_int($row[$key][$i]/$row[$key][$j])) $div[]=$row[$key][$i]/$row[$key][$j];
				}
			}
		}
	// print_r($div);
	echo array_sum($div)."\n\r";
?>