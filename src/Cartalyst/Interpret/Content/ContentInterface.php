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

interface ContentInterface {

	/**
	 * Creates a new content instance.
	 *
	 * @param  string  $slug
	 * @param  string  $value
	 * @param  array   $attributes
	 * @return void
	 */
	public function __construct($slug, $value, array $attributes = null);

	/**
	 * Set the location which the content came
	 * from.
	 *
	 * @return string
	 */
	public function getLocation();

	/**
	 * Sets the location which the content came
	 * from.
	 *
	 * @param  string  $location
	 */
	public function setLocation($location);

	/**
	 * Returns the content's slug.
	 *
	 * @return string
	 */
	public function getSlug();

	/**
	 * Returns the content's value.
	 *
	 * @return string
	 */
	public function getValue();

	/**
	 * Returns the HTML equivilent of the content.
	 *
	 * @return string
	 */
	public function toHtml();

	/**
	 * Get all of the current attributes for the content.
	 *
	 * @return array
	 */
	public function getAttributes();

	/**
	 * Set the Theme's attributes.
	 *
	 * @param  array  $attributes
	 * @return void
	 */
	public function setAttributes(array $attributes);

	/**
	 * Fill the content with an array of attributes.
	 *
	 * @param  array  $attributes
	 * @return void
	 */
	public function fill(array $attributes);

	/**
	 * Set a given attribute on the Theme.
	 *
	 * @param  string  $key
	 * @param  mixed   $value
	 * @return void
	 */
	public function setAttribute($key, $value);

	/**
	 * Get an attribute from the content.
	 *
	 * @param  string  $key
	 * @param  mixed   $default
	 * @return mixed
	 */
	public function getAttribute($key, $default = null);

}
