<?php
declare(strict_types=1);

namespace Core\Contracts\CoreAbstracts;
use Core\Contracts\CoreAbstracts\CoreAbstract;
use Core\Contracts\Traits\TraitExceptionsDelegator;

abstract class CoreAbstractController extends CoreAbstract
{
    use TraitExceptionsDelegator;
}