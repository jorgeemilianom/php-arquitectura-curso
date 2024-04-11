<?php
declare(strict_types=1);

namespace Core\Config;
use Core\Controllers\FrontController;

final class Kernel
{
    public function run()
    {
        session_start();
        $_SESSION['error'] .= '';
        $_SESSION['PageNotFound'] = true;
        $_SESSION['user_token'] .= '';
        
        if(!isset($_SESSION['User'])){
            $_SESSION['User'] = false;
        }
        
        FrontController::uriHook();
    }
}