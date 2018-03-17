<?php

namespace Compie\Micropay;

use Compie\Micropay\Actions\Send as SendAction;
use Compie\Micropay\Options\Send as SendOptions;

class Micropay
{
	private $config;

	public function __construct(array $config)
	{
		$this->config = $config;
	}

	public function send(SendOptions $sendOptions)
	{
		return (new SendAction($this->config, $sendOptions))->handle();
	}
}
