<?php
declare(strict_types=1);

namespace Core\Config;
use Core\Controllers\FrontController;
use Dotenv\Dotenv;

final class Kernel
{
    public function run()
    {
        $this->getDotEnv();
        session_start();
        $_SESSION['error'] .= '';
        $_SESSION['PageNotFound'] = true;
        $_SESSION['user_token'] .= '';
        
        if(!isset($_SESSION['User'])){
            $_SESSION['User'] = false;
        }
        
        FrontController::uriHook();
    }

    public function getDotEnv(): void
    {
        $loadCustomDefines = './.env';
        if (file_exists($loadCustomDefines)) {
            $dotenv = Dotenv::createImmutable('./');
            $dotenv->load();
        }
    }
}