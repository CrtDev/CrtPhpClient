CrtPhpClient
============

Requirements
------------

 * PHP 5.3 and later
 * php-curl

Getting Started
---------------

[Downdload](https://github.com/CrtDev/CrtPhpClient/archive/master.zip)

```php
require_once('/path/to/crt-php-client/init.php');

use CrtPhpClient\Crt;

$crt = new Crt();

$models = $crt->catalog()
    ->mark('TOYOTA')
    ->market('JAPAN');
    ->model();

print_r($models);

// Array
//  (
//     [0] => ALLEX
//     [1] => ALLION
//     [2] => ALPHARD
//     [3] => ALTEZZA
//     [4] => ALTEZZA GITA
//     [5] => ARISTO
//     [6] => AURIS
//     [7] => AVALON
//     [8] => AVENSIS
//     [9] => ...
```

Installation via Composer
-------------------------

```bash
composer require crtdev/crt-php-client:dev-master
```

```php
// example.php
<?php
require __DIR__.'/vendor/autoload.php';

use CrtPhpClient\Crt;

$crt = new Crt();
print_r($crt->catalog()->mark());
```

```bash
php example.php

# Array
#   (
#       [0] => AUDI
#       [1] => BMW
#       [2] => CHEVROLET
#       ...
```

Tests
-----

```bash
phpunit vendor/crtdev/crt-php-client
```