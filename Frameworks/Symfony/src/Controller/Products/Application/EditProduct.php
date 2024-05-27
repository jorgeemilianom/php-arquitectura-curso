<?php

namespace App\Controller\Products\Application;

use App\Contracts\BaseAbstractController;
use App\Storage\MySQL;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EditProduct extends BaseAbstractController
{
    #[Route('/product/{id}', name: 'app_products_edit', methods: ['PATCH'])]
    public function index(Request $request, string $id): JsonResponse
    {
        try {
            $DB= new MySQL();
            $status = $DB::update('m_products', [
                'product' => 'Jorgito'
            ], ['id' => $id]);
            
            return $this->json([
                'message' => 'Success',
                'data' => [],
                'status' => $status
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