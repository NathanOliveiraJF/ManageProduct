<?php

namespace App\Http\Controllers;
use Jenssegers\Blade\Blade;
class Controller
{
    protected Blade $view;
    public function __construct()
    {
        $this->view = $GLOBALS['blade'];
    }
}