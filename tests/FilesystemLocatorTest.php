<?php
/**
 * Part of the Sentry package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Sentry
 * @version    2.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2013, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Mockery as m;
use Cartalyst\Interpret\Locators\FilesystemLocator as Locator;

class FilesystemLocatorTest extends PHPUnit_Framework_TestCase {

	/**
	 * Close mockery.
	 *
	 * @return void
	 */
	public function tearDown()
	{
		m::close();
	}

	public function testCreatingFinder()
	{
		$locator = new Locator(__DIR__.'/stubs/filesystem');

		$this->assertInstanceOf('Symfony\Component\Finder\Finder', $locator->createFinder());
	}

	public function testLocating()
	{
		$locator = new Locator(__DIR__.'/stubs/filesystem');

		$expected = array(
			'md',
			'This is the page\'s content.',
			array('name' => 'Foo', 'description' => 'Bar baz'),
		);

		$this->assertCount(3, $result = $locator->locate('foo'));

		foreach ($result as $index => $value)
		{
			$this->assertEquals($expected[$index], $value);
		}

		$this->assertNull($locator->locate('bar'));
	}

}
