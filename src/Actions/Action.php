<?php

namespace Compie\Micropay\Actions;

use Compie\Micropay\Utils\ArrayFilterTrait;
use Compie\Micropay\Utils\PhoneNumberTrait;
use Compie\Micropay\Utils\ThirdPartyServicesTrait;

abstract class Action
{
	use PhoneNumberTrait, ThirdPartyServicesTrait, ArrayFilterTrait;

	protected $baseUrl = 'http://www.micropay.co.il/ExtApi/';

	protected function isSuccessResponse($response)
	{
		return $response['status'] === 200 && strpos($response['response'], 'ERROR') === false;
	}
}