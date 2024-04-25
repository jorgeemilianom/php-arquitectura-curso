<?php
declare(strict_types=1);

namespace Core\Modules\Backoffice\Application;
use Core\Contracts\CoreAbstract;
use Core\Contracts\CoreAbstracts\CoreAbstractApplication;
use Core\Services\Context;
use Core\Services\Request;
use Core\Storage\MySQL;
use Core\Modules\Backoffice\Infrastructure\BackofficeRepository;
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
            if(!isset($_POST['EMAIL'])) throw new InvalidArgumentException("Te faltó el campo EMAIL");
            

            // $products = $this->repository->getAllProducts();
            $products = $this->repository->__getAllProducts();
            $Context = Context::getContext();
            $Context->Data['TEST'] = "Esto es un mensaje";
            $Context->Data['product'] = $products[0]['name'];
        } catch (Throwable $th) {
            self::ExceptionCapture($th);
        }
    }
}