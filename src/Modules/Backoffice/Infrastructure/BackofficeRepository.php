<?php
declare(strict_types=1);

namespace Core\Modules\Backoffice\Infrastructure;
use Core\Storage\MySQL;

class BackofficeRepository extends MySQL
{
    public static function getAllProducts()
    {
        $products = self::getAll("products");
        return $products;
    }
}