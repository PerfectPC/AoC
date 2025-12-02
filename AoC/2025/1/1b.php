<?php
	$dial=50;
	$zero=0;
	// $position[0] = $dial;
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach ($input as $key=>$value) {
			$direction[$key+1] = substr($value, 0, 1);
			$clicks[$key+1] = substr($value, 1);
			switch ($direction[$key+1]) {
				case "L":
					for ($i=1; $i<=$clicks[$key+1]; $i++){
						$dial--;
						if ($dial<0) $dial+=100;
						if ($dial==0) $zero++;
					}
					break;
				case "R":
					for ($i=1; $i<=$clicks[$key+1]; $i++){
						$dial++;
						if ($dial>99) $dial-=100;
						if ($dial==0) $zero++;
					}
					break;
			}
			// $position[$key+1] = $dial;
		}
	// print_r($position);
	echo $zero."\n\r";
?>