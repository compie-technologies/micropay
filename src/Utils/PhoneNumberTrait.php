<?php

namespace Compie\Micropay\Utils;

trait PhoneNumberTrait
{
	public function sanitizePhoneNumber($phoneNumber)
	{
		$phoneNumber = str_replace(' ', '', $phoneNumber);
		$phoneNumber = str_replace('-', '', $phoneNumber);
		return $phoneNumber;
	}
}