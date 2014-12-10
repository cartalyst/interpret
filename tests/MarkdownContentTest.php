<?php namespace Cartalyst\Interpret\Tests;
/**
 * Part of the Interpret package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Cartalyst PSL License.
 *
 * This source file is subject to the Cartalyst PSL License that is
 * bundled with this package in the license.txt file.
 *
 * @package    Interpret
 * @version    1.1.1
 * @author     Cartalyst LLC
 * @license    Cartalyst PSL
 * @copyright  (c) 2011-2014, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use PHPUnit_Framework_TestCase;
use Cartalyst\Interpret\Content\MarkdownContent;

class MarkdownContentTest extends PHPUnit_Framework_TestCase {

	/**
	 * Setup.
	 *
	 * @return void
	 */
	public function setUp()
	{
		$this->content = new MarkdownContent('# Foo');
	}

	/** @test */
	public function it_can_retrieve_the_value()
	{
		$value = '# Foo';

		$this->assertEquals($value, $this->content->getValue());
	}

	/** @test */
	public function it_can_interpret_to_html()
	{
		$html = "<h1>Foo</h1>\n";

		$this->assertEquals($html, $this->content->toHtml());
	}

}
