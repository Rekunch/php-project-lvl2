<?php

namespace Tests\genDiffTest;

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use  function Differ\Differ\genDiff;

class genDiffTest extends TestCase
{
	public function testGenDiff()
	{
	//	$jsonBefore = json_decode(file_get_contents('tests/fixtures/file1.json'));
		//	$jsonAfter = json_decode(file_get_contents('tests/fixtures/file2.json'))
		$jsonBefore = 'tests/fixtures/file1.json';
		$jsonAfter = 'tests/fixtures/file2.json';
		$difference =	
"{
 - follow: false
   host: hexlet.io
 - proxy: 123.234.53.22
 - timeout: 50
 + timeout: 20
 + verbose: true
}";
$this->assertEquals($difference, genDiff($jsonBefore, $jsonAfter));
	}
}

