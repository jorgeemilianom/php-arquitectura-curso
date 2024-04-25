<?php
declare(strict_types=1);

namespace Core\Modules\Backoffice\Infrastructure;
use Core\Contracts\CoreAbstracts\CoreAbstractRepository;
use Core\Storage\SQLite;

class BackofficeRepository extends CoreAbstractRepository
{
    private $SQLite;

    public function __construct(Type $var = null) {
        $this->SQLite = new SQLite('test.db');
    }

    public function getAllProducts()
    {
        $products = self::getAll("products");
        return $products;
    }

    public function _getAllProducts()
    {
        $products = self::getAll("products");
        return $products;
    }

    public function __getAllProducts()
    {
        $products = $this->SQLite->exec("SELECT * FROM products");
        return $products;
    }
}