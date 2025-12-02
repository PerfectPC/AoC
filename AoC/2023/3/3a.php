<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
	foreach ($input as $key=>$line) {
		preg_match_all ("(\d+|[^\.\n\r])",$line,$matches[$key],PREG_OFFSET_CAPTURE);
	}
	foreach ($matches as $a=>$b) {
		foreach ($b[0] as $c=>$d) {
			$schema[$a][$d[1]] = $d[0];
		}
	}
	foreach ($schema as $row=>$items) {
		foreach ($items as $col=>$item) {
			if (is_numeric($item)) {
				$len = strlen($item);
				for ($j=-1; $j<=1; $j++) {
					for ($i=$col-1; $i<=$col+$len; $i++) {
						if (isset($schema[$row+$j][$i])) {
							if (!is_numeric($schema[$row+$j][$i])) $numbers[$row][$col]=$item;
						}
					}
				}
			}
		}
	}
	foreach($numbers as $number) {
		$sum+=array_sum($number);
	}
	echo $sum."\n";
?>