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
use Cartalyst\Interpret\Locators\EloquentLocator as Locator;

class EloquentLocatorTest extends PHPUnit_Framework_TestCase {

	/**
	 * Close mockery.
	 *
	 * @return void
	 */
	public function tearDown()
	{
		m::close();
	}

	public function testLocating()
	{
		$locator = m::mock('Cartalyst\Interpret\Locators\EloquentLocator[newQuery]');

		$locator->shouldReceive('newQuery')->twice()->andReturn($query = m::mock('StdClass'));
		$query->shouldReceive('where')->with('slug', '=', 'foo')->once()->andReturn($query1 = m::mock('StdClass'));
		$query1->shouldReceive('first')->once()->andReturn($content = new Locator);

		$content->slug         = 'foo';
		$content->format       = 'md';
		$content->value        = 'Hello world.';
		$content->created_at   = $createdAt = new DateTime;
		$content->updated_at   = $updatedAt = new DateTime;
		$content->additional_1 = 'corge';

		$expected = array(
			'md',
			'Hello world.',
			array(
				'additional_1' => 'corge',
				'created_at'   => $createdAt,
				'updated_at'   => $updatedAt,
			),
		);

		$this->assertCount(count($expected), $result = $locator->locate('foo'));

		foreach ($result as $index => $value)
		{
			$this->assertEquals($expected[$index], $value);
		}

		$query->shouldReceive('where')->with('slug', '=', 'bar')->once()->andReturn($query2 = m::mock('StdClass'));
		$query2->shouldReceive('first')->once()->andReturn(null);

		$this->assertNull($locator->locate('bar'));
	}

}
