<?php
declare(strict_types=1);

namespace Core\Modules\Users\Infrastructure;
use Core\Contracts\RequestControllerInterface;
use Core\Modules\Users\Application\AddUser;
use Core\Modules\Users\Application\GetUsers;
use Core\Modules\Users\Application\RemoveUser;
use Core\Modules\Users\Application\RemoveVirtualUser;
use Core\Services\Request;

class UsersController implements RequestControllerInterface
{
    public static function endpoints(): void
    {
        Request::Route('/users/add', function () {
            AddUser::index();
        });

        Request::Route('/users/get-all', function () {
            GetUsers::index();
        });
        
        Request::Route('/users/remove/logical', function () {
            RemoveVirtualUser::index();
        });

        Request::Route('/users/remove/physical-deletion', function () {
            RemoveUser::index();
        });

    }
}