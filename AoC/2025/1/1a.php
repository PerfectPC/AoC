<?php
	$dial[0]=50;
	$zero=0;
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$input = file("input.txt",FILE_IGNORE_NEW_LINES);
		foreach ($input as $key=>$value) {
			$direction[$key+1] = substr($value, 0, 1);
			$clicks[$key+1] = substr($value, 1);
			$dial[$key+1] = $direction[$key+1]=="R" ? $dial[$key] + $clicks[$key+1] : $dial[$key] - $clicks[$key+1];
			if ($dial[$key+1]==0) { $zero++; }
			while($dial[$key+1]<0) { $dial[$key+1]=$dial[$key+1]+100; if($dial[$key]<>0) $zero++;}
			while($dial[$key+1]>99) { $dial[$key+1]=$dial[$key+1]-100; $zero++; }
		}
	$count = array_count_values($dial);
	echo $count[0]."\n\r";
?>