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
use Cartalyst\Interpret\Interpreter;

class InterpreterTest extends PHPUnit_Framework_TestCase {

	/**
	 * Setup.
	 *
	 * @return void
	 */
	public function setUp()
	{
		$this->interpreter = new Interpreter;
	}

	/** @test */
	public function it_can_retrieve_content_mappings()
	{
		$expectedMappings = array(
			'Cartalyst\Interpret\Content\MarkdownContent' => array('md'),
		);

		$mappings = $this->interpreter->getContentMappings();

		$this->assertSame($expectedMappings, $mappings);
	}

	/** @test */
	public function it_can_add_content_mappings()
	{
		$expectedMappings = array(
			'Cartalyst\Interpret\Content\MarkdownContent' => array('md'),
			'Cartalyst\Interpret\Content\FooContent'      => array('foo'),
		);

		$this->interpreter->addContentMapping('Cartalyst\Interpret\Content\FooContent', 'foo');

		$mappings = $this->interpreter->getContentMappings();

		$this->assertSame($expectedMappings, $mappings);
	}

	/** @test */
	public function it_can_add_formats_to_content_mappings()
	{
		$expectedMappings = array(
			'Cartalyst\Interpret\Content\MarkdownContent' => array('md', 'mdm'),
		);

		$this->interpreter->addFormatsToContentMapping('Cartalyst\Interpret\Content\MarkdownContent', 'mdm');

		$mappings = $this->interpreter->getContentMappings();

		$this->assertSame($expectedMappings, $mappings);
	}

	/** @test */
	public function it_can_set_and_retrieve_the_fallback_class()
	{
		$this->assertEquals('Cartalyst\Interpret\Content\StringContent', $this->interpreter->getFallback());

		$this->interpreter->setFallback('Cartalyst\Interpret\Content\FooContent');

		$this->assertEquals('Cartalyst\Interpret\Content\FooContent', $this->interpreter->getFallback());
	}

	/** @test */
	public function it_can_make_content_for_interpretation()
	{
		$content = $this->interpreter->make('Foo', 'md');

		$this->assertInstanceOf('Cartalyst\Interpret\Content\MarkdownContent', $content);
	}

	/** @test */
	public function it_uses_the_fallback_class_if_no_matching_class_is_found()
	{
		$content = $this->interpreter->make('Foo', 'foo');

		$fallback = $this->interpreter->getFallback();

		$this->assertInstanceOf($fallback, $content);
	}

	/**
	 * @test
	 * @expectedException \RuntimeException
	 */
	public function it_throws_an_exception_when_making_an_invalid_class()
	{
		$this->interpreter->addContentMapping('stdClass', 'foo');

		$content = $this->interpreter->make('Foo', 'foo');
	}

}
