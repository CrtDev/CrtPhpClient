<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

require_once __DIR__.'/../init.php';

class CrtTest extends \PHPUnit_Framework_TestCase
{
	public function testCatalog()
	{
		$crt = new Crt();
		$crt->setApiAddress('http://dev.crt.ru/api/v1/');

		$this->assertContains(
			'AUDI',
			$crt->catalog()
				->mark()[0]
		);

		$this->assertContains(
			'JAPAN',
			$crt->catalog()
				->mark('TOYOTA')
				->market()
		);

		$this->assertContains(
			'CAMRY',
			$crt->catalog()
				->mark('TOYOTA')
				->market('JAPAN')
				->model());

		$this->assertContains(
			'ACV40',
			$crt->catalog()
				->mark('TOYOTA')
				->market('JAPAN')
				->model('CAMRY')
				->frame()
		);

		$this->assertContains(
			2016,
			$crt->catalog()
				->mark('TOYOTA')
				->market('JAPAN')
				->model('CAMRY')
				->year()
		);

		$frameLocations = $crt->catalog()
			->mark('TOYOTA')
			->market('JAPAN')
			->model('CAMRY')
			->frame('ACV40')
			->location();

		$this->assertEquals('Передняя подвеска', $frameLocations[50853]['location']);
		$this->assertEquals('1-01-895', $frameLocations[50853]['parts'][0]['part']);

		$yearLocations = $crt->catalog()
			->mark('TOYOTA')
			->market('JAPAN')
			->model('CAMRY')
			->year(2016)
			->location();

		$this->assertEquals('Передняя подвеска', $yearLocations[50853]['location']);
		$this->assertEquals('1-01-895', $yearLocations[50853]['parts'][0]['part']);

		$yearLocations = $crt->catalog()
			->mark('TOYOTA')
			->market('JAPAN')
			->model('CAMRY')
			->frame('ACV40')
			->year(2016)
			->location();

		$this->assertEquals('Передняя подвеска', $yearLocations[50853]['location']);
		$this->assertEquals('1-01-895', $yearLocations[50853]['parts'][0]['part']);
	}
}
