<?php
declare(strict_types=1);

namespace Core\Modules\Users\Infrastructure;
use Core\Contracts\RequestControllerInterface;
use Core\Controllers\LayoutController;
use Core\Modules\Users\Application\ValidateUser;
use Core\Services\Request;


final class UserController implements RequestControllerInterface
{
    public static function endpoints(): void
    {
        Request::Route('/login/', function () {

            Request::On('email', function (){
                ValidateUser::index();
            });
            LayoutController::head();
            LayoutController::nav();
            include './template/Pages/Login/Login.php';
            LayoutController::footer();
        });

    }
}