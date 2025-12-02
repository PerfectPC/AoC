<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = 325489;
	$size = ceil(sqrt($input));
	$end = pow($size,2);
	$corner = $end-$size+1;
	$mid = ($end+$corner)/2;
	$diff = abs($mid-$input);
	$center = ($size-1)/2;
	echo $center+$diff."\n\r";
?>