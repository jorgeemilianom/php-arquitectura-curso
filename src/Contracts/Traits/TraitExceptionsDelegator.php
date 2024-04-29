<?php
declare(strict_types=1);

namespace Core\Contracts\Traits;
use Throwable;


trait TraitExceptionsDelegator
{
    public static function ExceptionCapture(Throwable $Exception)
    {
        error_log($Exception);
    }
}
