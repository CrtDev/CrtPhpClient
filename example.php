<?php

// if installation via composer
// require_once 'vendor/autoload.php';

require_once 'init.php';

use CrtPhpClient\Crt;

$crt = new Crt();
$marks = $crt->catalog()->mark();

foreach ($marks as $mark) {
    echo "<li>$mark</li>";
}
