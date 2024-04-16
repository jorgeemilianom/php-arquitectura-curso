<?php
declare(strict_types=1);

namespace Core\Modules\Backoffice\Infrastructure;
use Core\Contracts\RequestControllerInterface;
use Core\Controllers\LayoutController;
use Core\Modules\Backoffice\Application\Init;
use Core\Services\AuthMiddleware;
use Core\Services\Context;
use Core\Services\Request;



final class BackofficeController implements RequestControllerInterface
{
    public static function endpoints(): void
    {
        Request::Route('/backoffice/', function () {
            $Middleware = new AuthMiddleware();
            $Middleware->validateSession();
            Init::index();
            
            $Context = Context::getContext();
            LayoutController::head();
            LayoutController::nav();
            include './template/Pages/Backoffice/Backoffice.php';
            LayoutController::footer();
        });
    }
}