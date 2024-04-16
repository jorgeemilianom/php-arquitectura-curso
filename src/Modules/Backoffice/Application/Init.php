<?php
declare(strict_types=1);

namespace Core\Modules\Backoffice\Application;
use Core\Services\Context;
use Core\Services\Request;

final class Init
{
    public static function index()
    {
        $Context = Context::getContext();
        $Context->Data['TEST'] = "Esto es un mensaje";
    }
}