<?php

namespace Compie\Micropay\Options;

use Compie\Micropay\Support\OptionsSupport;

class Send implements OptionContract
{
	/**
	 *
	 * Required Parameters
	 *
	 */

	/**
	 * User ID
	 * @var int
	 */
	public $uid = 0;

	/**
	 * User Name
	 * @var string
	 */
	public $un = '';

	/**
	 * Sub User
	 * @var string
	 */
	public $su = 0;

	/**
	 * Message charset
	 * @var string
	 */
	public $charset = OptionsSupport::CHARSET_UNICODE;

	/**
	 * Sender phone number
	 * @var int
	 */
	public $from = 0;

	/**
	 * Message
	 * @var string
	 */
	public $msg = '';

	/**
	 * Receiver numbers
	 * @var string
	 */
	public $list = '';

	public function getOptions(array $config): array
	{
		return [
			'uid' => $this->uid ?: array_get($config, 'uid'),
			'un' => $this->un ?: array_get($config, 'un'),
			'su' => $this->su ?: array_get($config, 'su'),
			'from' => $this->from ?: array_get($config, 'from'),
			'charset' => $this->charset ?: array_get($config, 'charset'),
			'msg' => $this->msg,
			'list' => $this->list,
		];
	}
}