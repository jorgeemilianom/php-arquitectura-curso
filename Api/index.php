<?php
use Core\Config\Kernel;
use Core\Services\Context;

require '../vendor/autoload.php';

$Context = new Context();

$Kernel = new Kernel();
$Kernel->runApi();