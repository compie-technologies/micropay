<?php

/**
 *
 * Micropay configuration
 *
 */
return [
	'uid' => env('MICROPAY_UID'),
	'ne' => env('REPORTED_MAIL_MICROPAY'),
	'su' => '1',
	'un' => env('MICROPAY_USERNAME'),
	'charset' => env('MICROPAY_CHARSET'),
	'fromPhoneNumber' => env('FROM_PHONE_NUMBER'),
];