<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

require_once __DIR__.'/../init.php';

class CrtTest extends \PHPUnit_Framework_TestCase
{
	public function testCatalogMark()
	{
		$crt = new Crt();

		$this->assertContains(
			'AUDI',
			$crt->catalog()
				->mark()[0]
		);
	}

	public function testCatalogMarket()
	{
		$crt = new Crt();

		$this->assertContains(
			'JAPAN',
			$crt->catalog()
				->mark('TOYOTA')
				->market()
		);

		$this->assertNotContains(
			'JAPAN',
			$crt->catalog()
				->mark('AUDI')
				->market()
		);
	}

	public function testCatalogModel()
	{
		$crt = new Crt();

		$this->assertContains(
			'HARRIER',
			$crt->catalog()
				->mark('TOYOTA')
				->market('JAPAN')
				->model());

		$this->assertNotContains(
			'HARRIER',
			$crt->catalog()
				->mark('TOYOTA')
				->market('USA')
				->model());

		$this->assertContains(
			'HIGHLANDER',
			$crt->catalog()
				->mark('TOYOTA')
				->market('USA')
				->model());
	}

	public function testCatalogFrame()
	{
		$crt = new Crt();

		$this->assertContains(
			'ACV40',
			$crt->catalog()
				->mark('TOYOTA')
				->market('JAPAN')
				->model('CAMRY')
				->frame()
		);

		$this->assertContains(
			'ACV40',
			$crt->catalog()
				->mark('TOYOTA')
				->market('JAPAN')
				->model('CAMRY')
				->year(2016)
				->frame()
		);

		$this->assertNotContains(
			'ACV40',
			$crt->catalog()
				->mark('TOYOTA')
				->market('JAPAN')
				->model('CAMRY')
				->year(2001)
				->frame()
		);
	}

	public function testCatalogYear()
	{
		$crt = new Crt();

		$this->assertContains(
			2016,
			$crt->catalog()
				->mark('TOYOTA')
				->market('JAPAN')
				->model('CAMRY')
				->year()
		);
	}

	public function testCatalogLocation()
	{
		$crt = new Crt();

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
