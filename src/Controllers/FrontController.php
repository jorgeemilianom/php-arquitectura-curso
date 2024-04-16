<?php
declare(strict_types=1);

namespace Core\Controllers;
use Core\Controllers\LayoutController;
use Core\Modules\Backoffice\Infrastructure\BackofficeController;
use Core\Modules\Users\Infrastructure\UserController;
use Core\Services\Request;

class FrontController extends LayoutController
{
    public function init()
    {

    }

    public static function uriHook(string $data = ''): void 
    {
        Request::Route('/', function () {
            include './template/Pages/Home/Home.php';
        });

        UserController::endpoints();
        BackofficeController::endpoints();
        
        Request::RouteNotFound();
    }
    
}