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
$ composer require crtdev/crt-php-client:1.*@dev
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

API documentation
-----------------

You can browse the whole documentation at [crt.ru/api/doc](http://crt.ru/api/doc).


There is an optional api format - .json and .xml:

 * [crt.ru/api/v1/marks.json](http://crt.ru/api/v1/marks.json) - json
 * [crt.ru/api/v1/marks.xml](http://crt.ru/api/v1/marks.xml) - xml
 * [crt.ru/api/v1/marks](http://crt.ru/api/v1/marks) - html page example

By calling an URL with the parameter ?_doc=1, you will get the corresponding documentation:

 * [crt.ru/api/v1/marks?_doc=1](http://crt.ru/api/v1/marks?_doc=1)