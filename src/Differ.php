<?php

namespace Differ\Differ;

function genDiff($file1, $file2)
{
      
    $string1 = file_get_contents($file1);
    $string2 = file_get_contents($file2);
    $array1 = json_decode($string1, true);
    $array2 = json_decode($string2, true);
    $one = "-";
    $two = "+";
    $no = " ";
    $result = "";
    foreach ($array1 as $key1 => $value1) {
        foreach ($array2 as $key2 => $value2) {
            if ($value1 === true) {
                $value1 = "true";
            }
            if ($value2 === true) {
                $value2 = "true";
            }
            if ($value1 === false) {
                $value1 = "false";
            }
            if ($value2 === false) {
                $value2 = "false";
            }
            if ($key1 === $key2 && $value1 === $value2) {
                $result .= " {$no} {$key1}: {$value1}\n";
            }
            if ($key1 === $key2 && $value1 !== $value2) {
                $result .= " {$one} {$key1}: {$value1}\n";
                $result .= " {$two} {$key2}: {$value2}\n";
            }
            if (array_key_exists($key1, $array2) === false) {
                    $result .= " {$one} {$key1}: {$value1}\n";
            }
            if (array_key_exists($key2, $array1) === false) {
                $result .= " {$two} {$key2}: {$value2}\n";
            }
        }
    }
    $result = explode("\n", $result);
    $result = array_unique($result);
    $num = 4;
    usort(
        $result,
            function ($v1, $v2) use ($num) {
                return substr($v1, $num - 1, 1) > substr($v2, $num - 1, 1) ? 1 : -1;
            }
    );
    unset($result[0]);
    $result = implode("\n", $result);
    $result = "{\n{$result}\n}";
    return($result);
}
   
