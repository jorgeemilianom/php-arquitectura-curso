<?php
declare(strict_types=1);

namespace Core\Config;
use Core\Controllers\FrontController;

final class Kernel
{
    public function run(): string
    {
        if(!isset($_SESSION['User'])){
            session_start();
            $_SESSION['User'] = false;
            $_SESSION['error'] .= '';
        }
        
        return FrontController::uriHook();
    }
}