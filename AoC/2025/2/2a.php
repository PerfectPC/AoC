<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		$ranges = explode(",",$input[0]);
		foreach ($ranges as $key=>$value) {
			$range = explode("-",$value);
			for ($i=$range[0]; $i<=$range[1]; $i++) {
				$len=strlen($i)/2;
				if (substr($i,0,$len)==substr($i,$len)) if(is_int($len)) $invalid[]=$i;
			}
		}
	// print_r($invalid);
	echo array_sum($invalid)."\n\r";
?>