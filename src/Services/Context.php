<?php
declare(strict_types=1);

namespace Core\Services;

class Context
{
    public $Data = [];

    public static function getContext(): self
    {
        global $Context;
        // $Context = new Context();
        return $Context;
    }
}