<?php

namespace Compie\Micropay\Options;

interface OptionContract
{
	public function getOptions(array $config): array;
}