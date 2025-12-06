<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach ($input as $key=>$value) {
			$matrix[] = str_split($value);
		}
		array_unshift($matrix, null);
		$matrix = call_user_func_array('array_map', $matrix);
		$matrix = array_map('array_reverse', $matrix);
		$temp=0;
		foreach ($matrix as $key=>$value) {
			if ($value[0]=='+' || $value[0]=='*') { $op=$value[0]; $temp++; }
			$num='';
			for ($i=1;$i<count($value);$i++) {
				if($value[$i]!='') $num = $num.$value[$i];
			}
			$num = trim(strrev($num));
			switch ($op) {
				case "+": if(!isset($result[$temp])) $result[$temp]=0; if(is_numeric($num)) $result[$temp] += intval($num); break;
				case "*": if(!isset($result[$temp])) $result[$temp]=1; if(is_numeric($num)) $result[$temp] *= intval($num); break;
			}
		}
	// print_r($result);
	echo (array_sum($result))."\n\r";
?>