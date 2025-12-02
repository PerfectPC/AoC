<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
	$array = array('one'=>'1','two'=>'2','three'=>'3','four'=>'4','five'=>'5','six'=>'6','seven'=>'7','eight'=>'8','nine'=>'9','zero'=>'0');
		foreach ($input as $line) {
			preg_match_all ("((?=(\d|one|two|three|four|five|six|seven|eight|nine)))",$line,$result);
			foreach ($result[1] as $value) {
			$result[2][] = is_numeric($value) ? $value : strtr ($value,$array);
		}
		$calibration[] = reset($result[2]).end($result[2]);
	}
	echo array_sum($calibration)."\n";
?>
