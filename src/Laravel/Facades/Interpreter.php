<?php namespace Cartalyst\Interpret\Laravel\Facades;
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

use Illuminate\Support\Facades\Facade;

class Interpreter extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'interpreter'; }

}
