<?php namespace Cartalyst\Themes\Sources;
/**
 * Part of the Themes package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Themes
 * @version    2.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2013, Cartalyst LLC
 * @link       http://cartalyst.com
 */

interface SourceInterface {

	/**
	 * Returns a book with the given slug.
	 *
	 * @param  string  $slug
	 * @return Cartalyst\Bookshelf\Books\BookInterface
	 */
	public function find($slug);

	/**
	 * Return all books as an array.
	 *
	 * @return  array
	 */
	public function all();

}
