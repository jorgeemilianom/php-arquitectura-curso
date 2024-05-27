<?php
declare(strict_types=1);

namespace App\Controller\Products\Application;

use App\Contracts\BaseAbstractController;
use App\Storage\MySQL;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreateProduct extends BaseAbstractController
{
    #[Route('/product', name: 'app_products_create', methods: ['POST'])]
    public function index(Request $request): JsonResponse
    {
        try {
            $DB= new MySQL();
            $status = $DB::insert('m_categories', [
                'business_id' => '1',
                'category' => 'test',
                'description' => 'una prueba'
            ]);
            
            return $this->json([
                'message' => 'Success',
                'data' => [],
                'status' => $status,
                'mata-info' => [
                    'productos_comprados' => [],
                    'categories' => [],
                ]
            ]);
        } catch (\Throwable $th) {
            return $this->json([
                'message' => 'Internal erro',
                'data' => [],
                'status' => false
            ], 500);
        }
    }
}