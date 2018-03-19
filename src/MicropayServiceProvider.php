<?php

namespace Compie\Micropay;

use Illuminate\Support\ServiceProvider;

class MicropayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		$this->publishes([
			__DIR__.'../config/micropay.php' => config_path('micropay.php'),
		], 'micropay');

	$this->app->singleton('micropay', function () {
		return new Micropay(config('micropay'));
	});
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'../config/micropay.php', 'micropay'
        );
    }
}
