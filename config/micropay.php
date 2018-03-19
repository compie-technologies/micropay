<?php

/**
 *
 * Micropay configuration
 *
 */
return [
	'uid' => env('MICROPAY_UID'),
	'su' => env('MICROPAY_SUB_USER', 0),
	'un' => env('MICROPAY_USERNAME'),
	'charset' => env('MICROPAY_CHARSET'),
	'from' => env('MICROPAY_FROM_PHONE_NUMBER'),
];