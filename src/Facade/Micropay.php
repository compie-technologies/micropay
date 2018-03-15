<?php

namespace Compie\Micropay\Facade;

use \Illuminate\Support\Facades\Facade;

class Micropay extends Facade
{
	/**
	 * Get the registered name of the component. This tells $this->app what record to return
	 * (e.g. $this->app[‘micropay’])
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'micropay'; }
}
