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
		foreach ($ids as $id) {
			foreach ($ranges as $range) {
				$split=strpos($range,"-");
				if($id>=substr($range,0,$split) && $id<=substr($range,$split+1)) { $fresh[]=$id.".".$range; break; }
			}
		}
	print_r($fresh);
	echo (count($fresh))."\n\r";
?>