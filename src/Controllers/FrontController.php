<?php
declare(strict_types=1);

namespace Core\Controllers;
use Core\Controllers\LayoutController;
use Core\Services\AuthMiddleware;

class FrontController extends LayoutController
{
    public function init()
    {

    }

    public static function uriHook(string $data = ''): string 
    {
        $Uri = $_SERVER['REQUEST_URI'];
        
        if ($Uri ==  '/') {

            return (string) include './template/Pages/Home/Home.php';
            
        }elseif ($Uri == '/login/' || $Uri == '/login') {

            return (string) include './template/Pages/Login/Login.php';

        }elseif ($Uri == '/backoffice/' || $Uri == '/backoffice') {
            // Aca va el Middleware
            $Middleware = new AuthMiddleware();
            $Middleware->validateSession();
            return (string) include './template/Pages/Backoffice/Backoffice.php';
            
        }
        
        return (string) include './template/Layout/NotFound.php';
    }
    
}