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
```

Response (array):

```json
[
    "ALLEX",
    "ALLION",
    "ALPHARD",
    "ALTEZZA",
    "ALTEZZA GITA",
    "ARISTO",
    "AURIS",
    "AVALON",
    "AVENSIS",
    "..."
]
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