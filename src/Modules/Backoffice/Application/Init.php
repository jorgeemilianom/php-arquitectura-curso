<?php
declare(strict_types=1);

namespace Core\Modules\Backoffice\Application;
use Core\Contracts\CoreAbstract;
use Core\Contracts\CoreAbstracts\CoreAbstractApplication;
use Core\Services\Context;
use Core\Services\Request;
use Core\Storage\MySQL;
use Core\Modules\Backoffice\Infrastructure\BackofficeRepository;
use Core\Storage\SQLite;
use Exception;
use InvalidArgumentException;
use Throwable;

final class Init extends CoreAbstractApplication
{
    private $repository;
    public function __construct() {
        $this->repository = new BackofficeRepository();
    }
    
    public function index()
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