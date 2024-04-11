<?php
declare(strict_types=1);

namespace Core\Modules\Users\Infrastructure;
use Core\Contracts\RequestControllerInterface;
use Core\Modules\Users\Application\ValidateUser;
use Core\Services\AuthMiddleware;
use Core\Services\Request;


final class UserController implements RequestControllerInterface
{
    public static function endpoints(): void
    {
        Request::Route('/login/', function () {

            Request::On('email', function (){
                ValidateUser::index();
            });

            return (string) include './template/Pages/Login/Login.php';
        });

        Request::Route('/backoffice/', function () {
            $Middleware = new AuthMiddleware();
            $Middleware->validateSession();
            return (string) include './template/Pages/Backoffice/Backoffice.php';
        });
    }
}