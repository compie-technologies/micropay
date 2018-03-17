<?php

namespace Compie\Micropay\Actions;

use Compie\Micropay\Exceptions\SendException;
use Compie\Micropay\Options\Send as SendOptions;
use Compie\Micropay\Traits\Action;
use Compie\Micropay\Traits\PhoneNumberUtils;
use Compie\Micropay\Traits\ThirdPartyServices;

class Send
{
	use Action;
	use PhoneNumberUtils;
	use ThirdPartyServices;

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

	public function handle()
	{
		$options = $this->sendOptions->getOptions($this->config);

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

	private function prepareOptions($options)
	{
		if (isset($options['from'])) {
			$options['from'] = $this->sanitizePhoneNumber($options['from']);
		}

		return $options;
	}
}