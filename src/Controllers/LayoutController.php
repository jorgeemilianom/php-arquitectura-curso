<?php

namespace Core\Controllers;

abstract class LayoutController
{
    protected static function head()
    {
        return '<link rel="stylesheet" type="text/css" href="css/layout.css">';
    }

    public function footer()
    {
        echo '<script type="text/javascript" src="js/layout.js"></script>';
    }
}