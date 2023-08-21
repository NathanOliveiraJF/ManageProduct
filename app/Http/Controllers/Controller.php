<?php

namespace App\Http\Controllers;
use Jenssegers\Blade\Blade;
abstract class Controller
{
    public function view(): Blade
    {
        return $GLOBALS['blade'];
    }
}