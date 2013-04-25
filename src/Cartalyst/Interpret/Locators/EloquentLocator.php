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

use Illuminate\Database\Eloquent\Model;

class EloquentLocator extends Model implements LocatorInterface {

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'content';

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
	public function locate($slug)
	{
		$content = $this
			->newQuery()
			->where('slug', '=', $slug)
			->first();

		if ( ! $content) return;

		return $this->transformContent($content);
	}

	/**
	 * Locates all content, returning an array of
	 * arrays in the same format as locate().
	 *
	 * @return array
	 */
	public function locateAll()
	{
		$me = $this;
		return array_map(function($content) use ($me)
		{
			return $me->transformContent($content);
		}, $this->newQuery()->all()->all());
	}

	/**
	 * Get the location.
	 *
	 * @return string
	 */
	public function getLocation()
	{
		return 'eloquent';
	}

	/**
	 * Transforms a content instance into the required
	 * format for the LocatorInterface.
	 *
	 * @param  Cartalyst\Interpret\Locators\EloquentLocator  $content
	 * @return array
	 */
	public function transformContent($content)
	{
		return array(
			$content->format,
			$content->value,
			array_diff_key($content->attributesToArray(), array_flip(array('slug', 'format', 'value', 'created_at', 'updated_at')))
		);
	}

}
