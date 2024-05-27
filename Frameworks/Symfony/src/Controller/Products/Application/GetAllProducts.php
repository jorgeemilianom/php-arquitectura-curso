<?php

namespace App\Controller\Products\Application;

use App\Contracts\BaseAbstractController;
use App\Storage\MySQL;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GetAllProducts extends BaseAbstractController
{
    #[Route('/products', name: 'app_products_all', methods: ['GET'])]
    public function index(Request $request): JsonResponse
    {
        $DB= new MySQL();

        
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'data' => [],
            'status' => $DB::getAll('m_products')
        ]);
    }
}