<?php
declare(strict_types=1);

namespace Core\Modules\Usersv1\Application;

use Core\Modules\Usersv1\Domain\User;
use Core\Services\AuthMiddleware;
use Core\Services\Request;

final class ValidateUser
{
    public static function index()
    {
        $email = Request::Post('email');
        $password = Request::Post('password');

        $User = new User();

        if(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
            $_SESSION['error'] = "Formato del email, incorrecto";
            return;
        }

        if($email == $User->getEmail() && $password == $User->getToken()) {
            $_SESSION['User'] = true;
            $_SESSION['user_token'] = AuthMiddleware::TOKEN;
            Request::RouteHook('/backoffice/');
            return;
        }

        $_SESSION['user_token'] = '';
        $_SESSION['error'] = "Invalid email or password";
    }
}