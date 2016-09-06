<?php

/**
 * Copyright (c) 2016 CRT. All rights reserved.
 */

require_once __DIR__.'/../init.php';

use CrtApiClient\Crt;

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

		$crt = new Crt();

		$this->assertContains(
			2016,
			$crt->catalog()
				->mark('TOYOTA')
				->market('JAPAN')
				->model('CAMRY')
				->frame('ACV40')
				->year()
		);

		$this->assertNotContains(
			2001,
			$crt->catalog()
				->mark('TOYOTA')
				->market('JAPAN')
				->model('CAMRY')
				->frame('ACV40')
				->year()
		);
	}

	public function testCatalogLocation()
	{
		$crt = new Crt();

		$frameGroups = $crt->catalog()
			->mark('TOYOTA')
			->market('JAPAN')
			->model('CAMRY')
			->frame('ACV40')
			->group();

		$this->assertEquals('ACV40', $frameGroups[0]['frame']);
		$this->assertEquals('06.01 –', $frameGroups[0]['period']);
		$this->assertEquals('Задняя подвеска', $frameGroups[0]['locations'][0]['location']);
		$this->assertEquals(43598, $frameGroups[0]['locations'][0]['img']);

		$firstPart = $frameGroups[0]['locations'][0]['parts'][0];
		$this->assertEquals(1, $firstPart['position']);
		$this->assertEquals('1-01-040', $firstPart['id']);
		$this->assertEquals(2, $firstPart['qtyInPack']);

		$yearGroups = $crt->catalog()
			->mark('TOYOTA')
			->market('JAPAN')
			->model('CAMRY')
			->year(2001)
			->group();

		$this->assertEquals('ACV35', $yearGroups[0]['frame']);

		$yearFrameGroups = $crt->catalog()
			->mark('TOYOTA')
			->market('JAPAN')
			->model('CAMRY')
			->frame('ACV40')
			->year(2016)
			->group();

		$this->assertEquals('ACV40', $yearFrameGroups[0]['frame']);
	}
}
