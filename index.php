<?php
require './src/Config/Defines.php';
require './vendor/autoload.php';

use Core\Config\Kernel;


$kernel = new Kernel();

include './template/Sections/Head.php';

$kernel->run();


include './template/Sections/Footer.php';