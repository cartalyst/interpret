<?php namespace Cartalyst\Interpret\Content;
/**
 * Part of the Interpret package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under BSD-3-Clause.
 *
 * This source file is subject to the BSD-3-Clause License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Interpret
 * @version    1.1.1
 * @author     Cartalyst LLC
 * @license    BSD-3-Clause
 * @copyright  (c) 2011-2014, Cartalyst LLC
 * @link       http://cartalyst.com
 */

abstract class Content {

	/**
	 * The content's value.
	 *
	 * @var string
	 */
	protected $value;

	/**
	 * Creates a new content instance.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function __construct($value)
	{
		$this->value = $value;
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

}
