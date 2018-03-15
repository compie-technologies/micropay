# Laravel Micropay - SMS Gateway

<p align="center">
<a href="https://travis-ci.org/compie/micropay"><img src="https://travis-ci.org/compie/micropay.svg?branch=master" alt="NPM"></a>
<a href="https://packagist.org/packages/compie/micropay"><img src="https://poser.pugx.org/compie/micropay/version.png" alt="NPM"></a>
<a href="https://packagist.org/packages/compie/micropay"><img src="https://poser.pugx.org/compie/micropay/d/total.png" alt="NPM"></a>
<a href="http://choosealicense.com/licenses/mit/"><img src="https://poser.pugx.org/compie/micropay/license.png" alt="NPM"></a>
</p>

## Install

To get the latest version of Laravel-Micropay on your project, require it from "composer":


```composer require compie/micropay ```

Then publish config file (**larabill.php**):

```php artisan vendor:publish --tag=micropay```

## Laravel 5.5+:
If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```Compie\Micropay\MicropayServiceProvider::class,```

If you want to use the facade to log messages, add this to your facades in app.php:

```'Micropay' => \Compie\Micropay\Facade\Micropay::class,```

## Basic Usage
```php
use Compie\Micropay\Facade\Micropay;

// Prepare send
$send = new \Compie\Micropay\Options\Send();
$send->from = '050000000';
$send->list = '054000000';
$send->msg = 'Hello world';

// Send error will throw exception
try {
    Micropay::send($send);
} catch (SendException $e) {
    $e->getMessage();
}
```

## Credits

- [ybaruchel](https://github.com/ybaruchel)
- [GabiGlazberg](https://github.com/GabiGlazberg)
    - For the Micropay Client implementation

## License
The MIT License (MIT). Please see License File for more information.