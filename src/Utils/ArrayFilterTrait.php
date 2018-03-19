<?php

namespace Compie\Micropay\Utils;

trait ArrayFilterTrait
{
	public function filterArray(array $array)
	{
		return ($array !== NULL && $array !== FALSE && $array !== '');
	}
}