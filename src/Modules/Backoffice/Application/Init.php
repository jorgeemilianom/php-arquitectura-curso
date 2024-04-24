<?php
declare(strict_types=1);

namespace Core\Modules\Backoffice\Application;
use Core\Services\Context;
use Core\Services\Request;
use Core\Storage\MySQL;
use Core\Modules\Backoffice\Infrastructure\BackofficeRepository;
use Core\Storage\SQLite;

final class Init extends BackofficeRepository
{
    public static function index()
    {
        try {
            // $products = self::getAllProducts();
            $Context = Context::getContext();
            $Context->Data['TEST'] = "Esto es un mensaje";
            // $Context->Data['product'] = $products[0]['name'];

            $SQLite = new SQLite('./src/Modules/Backoffice/Infrastructure/Links.db');

            $status = $SQLite->db->exec("CREATE TABLE IF NOT EXISTS Links (
                id INTEGER PRIMARY KEY, 
                name_link TEXT, 
                link TEXT, 
                )");

            

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}