<?php namespace Cartalyst\Interpret\Locators;
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

interface LocatorInterface {

	/**
	 * Locates content with the given slug. If content
	 * is found, an array with three values should be
	 * returned.
	 *
	 * The first value is a string with the content
	 * type, e.g. "markdown", "html".
	 *
	 * The second value is a string with the content's
	 * value, e.g. "Why'd the chicken cross the road?"
	 *
	 * The third value is an (optional) key / value
	 * array of additional attributes for the content.
	 *
	 * If no content can be found, "null" is returned.
	 *
	 * @param  string  $slug
	 * @return array|null
	 */
	public function locate($slug);

	/**
	 * Locates all content, returning an array of
	 * arrays in the same format as locate().
	 *
	 * @return array
	 */
	public function locateAll();

}
