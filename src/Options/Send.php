<?php

namespace Compie\Micropay\Options;

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


	/**
	 *
	 * Optional Parameters
	 *
	 */

	/**
	 * Sub User
	 * @var int
	 */
	public $su = 0;

	/**
	 * Message description
	 * @var string
	 */
	public $desc = '';

	/**
	 * Max sms messages (range 1-300000)
	 * @var int
	 */
	public $ms = 300000;

	/**
	 * Notifications phone number
	 * @var int
	 */
	public $np = false;

	/**
	 * Notifications email
	 * @var string
	 */
	public $ne = '';


	/**
	 *
	 * Message Schedule Parameters
	 *
	 */

	/**
	 * Delivery hour (range 00-23)
	 * @var int
	 */
	public $dh = false;

	/**
	 * Delivery minute (range 00-59)
	 * @var int
	 */
	public $di = false;

	/**
	 * Delivery year (4 digits)
	 * @var int
	 */
	public $dy = false;

	/**
	 * Delivery month (range 01-12)
	 * @var int
	 */
	public $dm = false;

	/**
	 * Delivery day (range 01-31)
	 * @var int
	 */
	public $dd = false;


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
			'desc' => $this->desc,
			'ms' => $this->ms,
			'np' => $this->np,
			'ne' => $this->ne,
			'dh' => $this->dh,
			'di' => $this->di,
			'dy' => $this->dy,
			'dm' => $this->dm,
			'dd' => $this->dd,
		];
	}
}