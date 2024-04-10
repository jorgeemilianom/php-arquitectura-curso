<?php 
declare(strict_types=1);

namespace Core\Contracts;

interface RequestControllerInterface {
    public static function endpoints(): void;
}