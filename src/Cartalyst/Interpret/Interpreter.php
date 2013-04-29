<?php namespace Cartalyst\Interpret;
/**
 * Part of the Interpret package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Interpret
 * @version    1.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2013, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Cartalyst\Interpret\Content\ContentInterface;

class Interpreter {

	/**
	 * Array of mappings where the key is the class
	 * and the value is the format(s) the class is
	 * responsible for.
	 *
	 * @var array
	 */
	protected $contentMappings = array(
		'Cartalyst\Interpret\Content\MarkdownContent' => array('md'),
		'Cartalyst\Interpret\Content\HtmlContent'     => array('html'),
	);

	/**
	 * The fallback class which handles content.
	 *
	 * @var string
	 */
	protected $fallback = 'Cartalyst\Interpret\Content\StringContent';

	/**
	 * Make a piece of content to be interpreted.
	 *
	 * @param  string  $value
	 * @param  string  $format
	 * @return Cartalyst\Interpret\Content\ContentInterface
	 */
	public function make($value, $format = null)
	{
		return $this->createContent($value, $format);
	}

	/**
	 * Get the content mappings.
	 *
	 * @return array
	 */
	public function getContentMappings()
	{
		return $this->contentMappings;
	}

	/**
	 * Adds a content mapping.
	 *
	 * @param  string  $class
	 * @param  array   $formats
	 * @return void
	 */
	public function addContentMapping($class, $formats)
	{
		$this->contentMappings[$class] = (array) $formats;
	}

	/**
	 * Adds a format(s) to the given content mapping.
	 *
	 * @param  string  $class
	 * @param  string|array  $formats
	 * @return void
	 */
	public function addFormatsToContentMapping($class, $formats)
	{
		$this->contentMappings[$class] = array_merge(
			$this->contentMappings[$class],
			(array) $formats
		);
	}

	/**
	 * Get the fallback content class.
	 *
	 * @return strin
	 */
	public function getFallback()
	{
		return $this->fallback;
	}

	/**
	 * Set the fallback content class.
	 *
	 * @param  string  $fallback
	 * @return void
	 */
	public function setFallback($fallback)
	{
		$this->fallback = $fallback;
	}

	/**
	 * Creates content with the given name and value.
	 *
	 * @param  string  $value
	 * @param  string  $format
	 * @return Cartalyst\Interpet\Content\ContentInterface
	 */
	protected function createContent($value, $format = null)
	{
		if ($format)
		{
			foreach ($this->contentMappings as $class => $formats)
			{
				if ( ! in_array($format, $formats)) continue;

				return $this->createContentInstance($class, $value);
			}
		}

		return $this->createContentInstance($this->fallback, $value);
	}

	/**
	 * Creates a class with the given value.
	 *
	 * @param  string  $class
	 * @param  string  $value
	 * @return Cartalyst\Interpet\Content\ContentInterface
	 */
	protected function createContentInstance($class, $value)
	{
		$_class = '\\'.ltrim($class, '\\');

		$instance =  new $_class($value);

		if ( ! $instance instanceof ContentInterface)
		{
			throw new \RuntimeException("Content clas must be an instance of [Cartalyst\Interpret\Content\ContentInterface], [$class] given.");
		}

		return $instance;
	}

}
