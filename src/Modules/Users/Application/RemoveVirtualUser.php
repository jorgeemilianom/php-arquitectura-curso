<?php
declare(strict_types=1);

namespace Core\Modules\Users\Application;
use Core\Contracts\CoreAbstracts\CoreAbstractApplication;
use Core\Contracts\Interface\IApplication;
use Core\Services\JsonResponse;

final class RemoveVirtualUser extends CoreAbstractApplication implements IApplication
{

    public static function index(): JsonResponse
    {
        return new JsonResponse([
            'data' => [],
            'status' => true,
            'message' => 'RemoveVirtualUser Successfully',
            'metadata' => [],
        ]);
    }

}