<?php namespace Cartalyst\Interpret\Content;
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

abstract class Content {

	/**
	 * The content's slug.
	 *
	 * @var string
	 */
	protected $slug;

	/**
	 * The content's value.
	 *
	 * @var string
	 */
	protected $value;

	/**
	 * The content's attributes.
	 *
	 * @var array
	 */
	protected $attributes = array();

	/**
	 * Creates a new content instance.
	 *
	 * @param  string  $slug
	 * @param  string  $value
	 * @param  array   $attributes
	 * @return void
	 */
	public function __construct($slug, $value, array $attributes = null)
	{
		$this->slug  = $slug;
		$this->value = $value;

		if (isset($attributes))
		{
			$this->attributes = $attributes;
		}
	}

	/**
	 * Returns the content's slug.
	 *
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * Returns the content's value.
	 *
	 * @return string
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * Get all of the current attributes for the content.
	 *
	 * @return array
	 */
	public function getAttributes()
	{
		return $this->attributes;
	}

	/**
	 * Set the Theme's attributes.
	 *
	 * @param  array  $attributes
	 * @return void
	 */
	public function setAttributes(array $attributes)
	{
		$this->attributes = $attributes;
	}

	/**
	 * Fill the content with an array of attributes.
	 *
	 * @param  array  $attributes
	 * @return void
	 */
	public function fill(array $attributes)
	{
		foreach ($attributes as $key => $value)
		{
			$this->setAttribute($key, $value);
		}
	}

	/**
	 * Set a given attribute on the Theme.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function setAttribute($key, $value)
	{
		$this->attributes[$key] = $value;
	}

	/**
	 * Get an attribute from the content.
	 *
	 * @param  string  $key
	 * @param  mixed   $default
	 * @return mixed
	 */
	public function getAttribute($key, $default = null)
	{
		if (array_key_exists($key, $this->attributes))
		{
			return $this->attributes[$key];
		}

		return value($default);
	}

	/**
	 * Dynamically retrieve attributes on the object.
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->getAttribute($key);
	}

	/**
	 * Dynamically set attributes on the object.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function __set($key, $value)
	{
		$this->setAttribute($key, $value);
	}

	/**
	 * Determine if an attribute exists on the object.
	 *
	 * @param  string  $key
	 * @return void
	 */
	public function __isset($key)
	{
		return isset($this->attributes[$key]);
	}

	/**
	 * Unset an attribute on the object.
	 *
	 * @param  string  $key
	 * @return void
	 */
	public function __unset($key)
	{
		unset($this->attributes[$key]);
	}

}
