<?php namespace Cartalyst\Sentry;
/**
 * Part of the Sentry package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Sentry
 * @version    2.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2013, Cartalyst LLC
 * @link       http://cartalyst.com
 */

use Cartalyst\Interpret\Locators\EloquentLocator;
use Cartalyst\Interpret\Locators\FilesystemLocator;
use Cartalyst\Interpret\Interpreter;
use Illuminate\Support\ServiceProvider;

class InterpretServiceProvider extends ServiceProvider {

	/**
	 * Boot the service provider.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('cartalyst/interpret', 'cartalyst/interpret');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['interpret.locator.eloquent'] = $this->app->share(function($app)
		{
			return new EloquentLocator;
		});

		$this->app['interpret.locator.filesystem'] = $this->app->share(function($app)
		{
			$path = $app['config']['cartalyst/interpret::file.path'];

			return new FilesystemLocator($path);
		});

		$this->app['interpret'] = $this->app->share(function($app)
		{
			$locators = array($app['interpret.locator.eloquent'], $app['interpret.locator.filesystem']);

			return new Interpreter($locators);
		});
	}

}
