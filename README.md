CrtPhpClient
============

Requirements
------------

PHP 5.3 and later.

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

Response

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

### Installation via Composer

```bash
composer require crtdev/crt-php-client:dev-master
```
