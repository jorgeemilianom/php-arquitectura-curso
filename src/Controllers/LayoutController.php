<?php

namespace Core\Controllers;

abstract class LayoutController
{
    public static function head()
    {
        require_once './template/Sections/Head.php';
    }

    public static function footer()
    {
        require_once './template/Sections/Footer.php';
    }

    public static function nav()
    {
        require_once './template/Layout/Nav.php';
    }

}