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

class StringContent extends Content implements ContentInterface {

	/**
	 * {@inheritDoc}
	 */
	public function toHtml()
	{
		return $this->getValue();
	}

}
