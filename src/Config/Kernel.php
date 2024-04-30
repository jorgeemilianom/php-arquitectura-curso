<?php
declare(strict_types=1);

namespace Core\Config;
use Core\Controllers\FrontController;
use Core\Services\JsonResponse;
use Dotenv\Dotenv;

final class Kernel
{
    public function run()
    {
        $this->getDotEnv();
        session_start();
        $_SESSION['error'] .= '';
        $_SESSION['PageNotFound'] = true;
        $_SESSION['user_token'] .= '';
        
        if(!isset($_SESSION['User'])){
            $_SESSION['User'] = false;
        }
        
        FrontController::uriHook();
    }

    public function runApi()
    {
        $this->getDotEnv();
        $this->loadFiles();
        $this->Welcome();
    }

    public function getDotEnv(): void
    {
        $loadCustomDefines = './.env';
        if (file_exists($loadCustomDefines)) {
            $dotenv = Dotenv::createImmutable('./');
            $dotenv->load();
        }
    }

    private function loadFiles()
    {
        $loadFileEndpointsController = '../src/Endpoints.php';
        if (file_exists($loadFileEndpointsController)) {
            require $loadFileEndpointsController;
        }
    }

    private function Welcome(): JsonResponse
    {
        if($_SERVER['REQUEST_URI'] == '/') {
            return new JsonResponse([
                'data' => [],
                'message' => 'Welcome to MyFramework',
                'status' => true,
                'metadata' => [],
            ], 200);
        }

        return $this->endpointNotFound();
    }

    private function endpointNotFound():? JsonResponse
    {
        return new JsonResponse([
            'data' => [],
           'message' => 'Endpoint not found',
           'status' => false,
           'metadata' => [],
        ], 404);
    }
}