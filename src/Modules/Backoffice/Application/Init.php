<?php
declare(strict_types=1);

namespace Core\Modules\Backoffice\Application;
use Core\Services\Context;
use Core\Services\Request;
use Core\Storage\MySQL;
use Core\Modules\Backoffice\Infrastructure\BackofficeRepository;

final class Init extends BackofficeRepository
{
    public static function index()
    {
        try {
            $products = self::getAllProducts();
            $Context = Context::getContext();
            $Context->Data['TEST'] = "Esto es un mensaje";
            $Context->Data['product'] = $products[0]['name'];
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}