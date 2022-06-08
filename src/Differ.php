<?php

namespace Differ\Differ;

function genDiff($file1 , $file2, $format ='stylish'){
       
    $result ='';
    $allMatches = '';
    $inTwo = '+';
    $difference ='-';
    $fileOne = file($file1);
    $fileTwo = file($file2);
    foreach ($fileOne as $keyOne => $valueOne) {
        foreach ($fileTwo as $keyTwo => $valueTwo) {
	    if ($keyOne === $keyTwo && $valueOne === $valueTwo) {
		    $result = "{$keyOne}:{$valueOne};
		    return $result;
	    }
	}
    }
}
