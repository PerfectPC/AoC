<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		$ranges = explode(",",$input[0]);
		foreach ($ranges as $key=>$value) {
			$range = explode("-",$value);
			for ($i=$range[0]; $i<=$range[1]; $i++) {
				$len=strlen($i);
				for ($j=2; $j<=$len; $j++) {
					if (is_int($len/$j)) {
						$split=str_split($i,$len/$j);
						if (count(array_unique($split))==1) $invalid[]=$i;
					}
				}
			}
		}
	// print_r(array_unique($invalid));
	echo array_sum(array_unique($invalid))."\n\r";
?>