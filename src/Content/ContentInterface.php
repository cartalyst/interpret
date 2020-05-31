<?php namespace Cartalyst\Interpret\Content;
/**
 * Part of the Interpret package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Interpret
 * @version    1.1.3
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2020, Cartalyst LLC
 * @link       https://cartalyst.com
 */

interface ContentInterface {

	/**
	 * Creates a new content instance.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function __construct($value);

	/**
	 * Returns the content's value.
	 *
	 * @return string
	 */
	public function getValue();

	/**
	 * Returns the HTML equivalent of the content.
	 *
	 * @return string
	 */
	public function toHtml();

}
