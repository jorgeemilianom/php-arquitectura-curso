<?php
declare(strict_types=1);

namespace Core\Contracts\CoreAbstracts;
use Core\Contracts\Traits\TraitExceptionsDelegator;
use Core\Storage\MySQL;

abstract class CoreAbstractRepository extends MySQL
{
    use TraitExceptionsDelegator;
}