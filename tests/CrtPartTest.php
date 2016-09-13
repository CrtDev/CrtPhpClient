<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

require_once __DIR__.'/../vendor/autoload.php';

use CrtPhpClient\Crt;

class CrtPartTest extends \PHPUnit_Framework_TestCase
{
	public function testGetPart()
	{
		$crt = new Crt();

		$part = $crt->part()->get('3-06-123');

		$this->assertEquals('3-06-123', $part['part']);
	}

	public function testSearchPartByOem()
	{
		$crt = new Crt();

		$parts = $crt->part()->search('48632-2');

		$this->assertEquals(3, count($parts));
		$this->assertEquals('48632-26010', $parts['1-06-206']['oems'][0]);
	}
}
