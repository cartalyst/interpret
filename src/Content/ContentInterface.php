<?php namespace Cartalyst\Interpret\Content;
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
 * @version    1.0.1
 * @author     Cartalyst LLC
 * @license    Cartalyst PSL
 * @copyright  (c) 2011-2014, Cartalyst LLC
 * @link       http://cartalyst.com
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
