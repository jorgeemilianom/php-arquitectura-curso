<?php
declare(strict_types=1);

namespace Core\Services;

final class AuthMiddleware
{

    const USER = 'test@test.com';
    const PASSWORD = '123456';
    const TOKEN = '123456789987654321abcdef';

    public function checkToken(): bool 
    {
        return isset($_SESSION['user_token']) && $_SESSION['user_token'] != self::TOKEN;
    }

    public function validateSession()
    {   
        if(!$this->checkToken()) {
            $_SESSION['error'] = 'Access Denied';
            header('Location: http://localhost/login/');
        }
        
    }
}