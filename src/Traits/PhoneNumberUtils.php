<?php

namespace Compie\Micropay\Traits;

trait PhoneNumberUtils
{
	public function sanitizePhoneNumber($phoneNumber)
	{
		$phoneNumber = str_replace(' ', '', $phoneNumber);
		$phoneNumber = str_replace('-', '', $phoneNumber);
		return $phoneNumber;
	}
}