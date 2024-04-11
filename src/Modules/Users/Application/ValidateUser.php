<?php
declare(strict_types=1);

namespace Core\Modules\Users\Application;

use Core\Modules\Users\Domain\User;
use Core\Services\AuthMiddleware;
use Core\Services\Request;

final class ValidateUser
{
    public static function index(): void
    {
        $email = Request::Post('email');
        $password = Request::Post('password');

        $User = new User();

        if($email == $User->getEmail() && $password == $User->getToken()) {
            $_SESSION['User'] = true;
            $_SESSION['user_token'] = AuthMiddleware::TOKEN;
            Request::RouteHook('/backoffice/');
        }

        $_SESSION['user_token'] = '';
        $_SESSION['error'] = "Invalid email or password";
    }
}