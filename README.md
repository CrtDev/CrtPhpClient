CrtPhpClient
============

Requirements
------------

 * PHP 5.3 and later
 * php-curl

Getting Started
---------------

[Downdload and unzip](https://github.com/CrtDev/CrtPhpClient/archive/master.zip)

```bash
$ wget https://github.com/CrtDev/CrtPhpClient/archive/master.zip
$ unzip master.zip
```



```php
<?php

require_once('CrtPhpClient-master/init.php');

use CrtPhpClient\Crt;

$crt = new Crt();

$models = $crt->catalog()
    ->mark('TOYOTA')
    ->market('JAPAN')
    ->model();

print_r($models);

// Array
//  (
//     [0] => ALLEX
//     [1] => ALLION
//     [2] => ALPHARD
//     ...
```

Installation via Composer
-------------------------

```bash
$ composer require crtdev/crt-php-client:dev-master
```

```php
<?php
require __DIR__.'/vendor/autoload.php';

use CrtPhpClient\Crt;

$crt = new Crt();
print_r($crt->catalog()->mark());

// Array
//   (
//       [0] => AUDI
//       [1] => BMW
//       [2] => CHEVROLET
//       ...
```

Tests
-----

```bash
$ phpunit vendor/crtdev/crt-php-client
```