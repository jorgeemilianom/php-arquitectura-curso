<?php
declare(strict_types=1);

namespace Core\Contracts\CoreAbstracts;
use Core\Contracts\Traits\TraitExceptionsDelegator;
use Core\Contracts\CoreAbstracts\CoreAbstract;

abstract class CoreAbstractApplication extends CoreAbstract
{
    use TraitExceptionsDelegator;
    
}