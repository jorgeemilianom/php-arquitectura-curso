<?php

namespace App\Controller;

use App\Contracts\BaseAbstractController;
use App\Storage\MySQL;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends BaseAbstractController
{
    #[Route('/products2', name: 'app_products')]
    public function index(): JsonResponse
    {
        $DB= new MySQL();

        $result = $DB::Query("SELECT * FROM m_products");
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductsController.php',
            'data' => $result
        ]);
    }
}
