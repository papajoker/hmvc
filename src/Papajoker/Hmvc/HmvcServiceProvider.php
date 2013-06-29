<?php namespace Papajoker\Hmvc;

use Illuminate\Support\ServiceProvider;

class HmvcServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		list($app, $view) = array($this->app, $this->app['view']);
		$view->addExtension('hmvc', 'hmvc', function() use ($app) {
			return new HmvcEngine();
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}