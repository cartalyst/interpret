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
use Cartalyst\Interpret\Content\StringContent as Content;

class StringContentTest extends PHPUnit_Framework_TestCase {

	/**
	 * Close mockery.
	 *
	 * @return void
	 */
	public function tearDown()
	{
		m::close();
	}

	public function testBasicUsage()
	{
		$content = new Content('foo', 'Hello world.', array('bar' => 'baz'));
		$this->assertEquals('foo', $content->getSlug());
		$this->assertEquals('Hello world.', $content->getValue());
		$this->assertEquals('Hello world.', $content->toHtml());
		$this->assertEquals('baz', $content->getAttribute('bar'));
	}

}
