<?php namespace Cartalyst\Interpret\Tests;
/**
 * Part of the Interpret package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Interpret
 * @version    1.1.3
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2020, Cartalyst LLC
 * @link       https://cartalyst.com
 */

use PHPUnit_Framework_TestCase;
use Cartalyst\Interpret\Content\StringContent;

class StringContentTest extends PHPUnit_Framework_TestCase {

	/**
	 * Setup.
	 *
	 * @return void
	 */
	public function setUp()
	{
		$this->content = new StringContent('Foo');
	}

	/** @test */
	public function it_can_retrieve_the_value()
	{
		$value = 'Foo';

		$this->assertEquals($value, $this->content->getValue());
	}

	/** @test */
	public function it_can_interpret_to_html()
	{
		$html = 'Foo';

		$this->assertEquals($html, $this->content->toHtml());
	}

}
