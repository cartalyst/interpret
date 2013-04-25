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

use Cartalyst\Interpret\Locators\LocatorInterface;

class Manager {

	/**
	 * Array of registered locator instances.
	 *
	 * @var array
	 */
	protected $locators = array();

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
		'Cartalyst\Interpret\Content\StringContent'   => array('*'),
	);

	/**
	 * Create a new manager.
	 *
	 * @param  array  $locators
	 * @return void
	 */
	public function __construct(array $locators = null, array $contentMappings = null)
	{
		if (isset($locators))
		{
			$this->locators = $locators;
		}

		if (isset($contentMappings))
		{
			$this->contentMappings = $contentMappings;
		}
	}

	/**
	 * Makes a piece of content by the given slug.
	 *
	 * @param  string  $slug
	 */
	public function make($slug)
	{
		foreach ($this->locators as $locator)
		{
			if ($located = $locator->locate($slug))
			{
				list($format, $value, $attributes) = $located;

				return $this->createContent($format, $slug, $value, $attributes);
			}
		}

		throw new ContentNotFoundException("Content [$slug] could not be found.");
	}

	/**
	 * Creates a content instance with the given parameters.
	 *
	 * @param  string  $format
	 * @param  string  $slug
	 * @param  string  $value
	 * @param  array   $attributes
	 * @return Cartalyst\Interpret\Content\ContentInterface
	 */
	public function createContent($format, $slug, $value, array $attributes = array())
	{
		foreach ($this->contentMappings as $class => $formats)
		{
			// If the formats doesn't contain the wildcad "*" format
			// and doesn't match the format we're after, we'll just
			// skip it.
			if ( ! in_array('*', $formats) and ! in_array($format, $formats))
			{
				continue;
			}

			return new $class($slug, $value, $attributes);
		}

		throw new \RuntimeException("Could not find class mapping for content [$slug] in [$format] format.");
	}

	/**
	 * Adds a new locator.
	 *
	 * @param  Cartalyst\Interpret\Locators\LocatorInterface  $locator
	 * @return void
	 */
	public function addLocator(LocatorInterface $locator)
	{
		$this->locators[] = $locator;
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

}
