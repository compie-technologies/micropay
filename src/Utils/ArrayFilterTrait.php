<?php

namespace Compie\Micropay\Utils;

trait ArrayFilterTrait
{
	public function filterArray($item)
	{
		return ($item !== NULL && $item !== FALSE && $item !== '');
	}
}