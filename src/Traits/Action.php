<?php

namespace Compie\Micropay\Traits;

trait Action
{
	private $baseUrl = 'http://www.micropay.co.il/ExtApi/';

	private function isSuccessResponse($response)
	{
		return $response['status'] === 200 && strpos($response['response'], 'ERROR') === false;
	}
}