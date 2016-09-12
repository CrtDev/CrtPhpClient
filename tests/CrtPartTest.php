<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

require_once __DIR__.'/../vendor/autoload.php';

use CrtPhpClient\Crt;

class CrtPartTest extends \PHPUnit_Framework_TestCase
{
	public function testCatalogMark()
	{
		$crt = new Crt();

		$part = $crt->part()->get('3-06-123');
//		$parts = $crt->part()->search('123');

		$this->assertEquals(
			'3-06-123',
			$part['part']
		);
	}
}
