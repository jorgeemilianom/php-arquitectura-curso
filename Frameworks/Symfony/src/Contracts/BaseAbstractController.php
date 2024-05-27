<?php

namespace App\Contracts;
use App\Storage\MySQL;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

abstract class BaseAbstractController extends AbstractController
{
    public function DB()
    {
        return new MySQL();
    }
}