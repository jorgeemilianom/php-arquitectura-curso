<?php
declare(strict_types=1);

namespace Core\Contracts\Interface;
use Core\Services\JsonResponse;

interface IApplication
{
    public static function index(): JsonResponse;
}