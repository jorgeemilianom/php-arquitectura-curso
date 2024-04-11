<?php
require './src/Config/Defines.php';
require './vendor/autoload.php';

use Core\Config\Kernel;

// Si alguien usa Mac y quiere ver los errores en pantalla usar:
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
// By: Patricio Gonzalez

error_reporting(E_ALL & ~E_WARNING);

$kernel = new Kernel();

include './template/Sections/Head.php';

$kernel->run();


include './template/Sections/Footer.php';