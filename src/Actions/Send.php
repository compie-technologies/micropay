<?php

namespace Compie\Micropay\Actions;

use Compie\Micropay\Exceptions\SendException;
use Compie\Micropay\Options\Send as SendOptions;

class Send extends Action
{
	/**
	 * @var SendOptions
	 */
	private $sendOptions;

	/**
	 * @var array
	 */
	private $config;

	public function __construct(array $config, SendOptions $sendOptions)
	{
		$this->sendOptions = $sendOptions;
		$this->config = $config;
	}

	public function handle(): bool
	{
		$options = array_filter($this->sendOptions->getOptions($this->config), [$this, 'filterArray']);

		$options = $this->prepareOptions($options);

		$parameters = [
			'post' => 2,
			'type' => 'sms',
		];

		$parameters = array_merge($parameters, $options);

		$response = $this->postRequest('ScheduleSms.php', $parameters);

		$sent = $this->isSuccessResponse($response);

		if (!$sent) {
			throw new SendException($response['response']);
		}

		return true;
	}

	private function prepareOptions($options): array
	{
		// Sanitizing sender phone number
		if (isset($options['from'])) {
			$options['from'] = $this->sanitizePhoneNumber($options['from']);
		}

		// Sanitizing notifications phone number
		if (isset($options['np'])) {
			$options['np'] = $this->sanitizePhoneNumber($options['np']);
		}

		return $options;
	}
}