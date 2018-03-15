<?php

namespace Compie\Micropay;

use Compie\Micropay\Exceptions\SendException;
use Compie\Micropay\Options\Send;
use Compie\Micropay\Traits\ThirdPartyServices;
use GuzzleHttp\Client;
use PHPUnit\Runner\Exception;

class Micropay
{
	use ThirdPartyServices;

	private $config;

	private $baseUrl = 'http://www.micropay.co.il/ExtApi/';

	public function __construct(array $config)
	{
		$this->config = $config;
	}

	public function send(Send $sendOptions)
	{
		$options = $sendOptions->getOptions($this->config);

		$options = $this->sanitizeOptionsPhoneNumbers($options);

		$parameters = [
			'post' => 2,
			'type' => 'sms',
		];

		$parameters = array_merge($parameters, $options);

		$response = $this->postRequest('ScheduleSms.php', $parameters);

		$sent = $response['status'] === 200 && strpos($response['response'], 'ERROR') === false;

		if ($sent) {
			return true;
		}

		throw new SendException($response['response']);
	}

	private function execute(string $endpoint, array $parameters)
	{
		$client = new Client();
		return $client->post($this->baseUrl . $endpoint . ['form_params' => $parameters]);
	}

	private function sanitizeOptionsPhoneNumbers($options)
	{
		if (isset($options['from'])) {
			$options['from'] = str_replace(' ', '', $options['from']);
			$options['from'] = str_replace('-', '', $options['from']);
		}

		return $options;
	}
}
