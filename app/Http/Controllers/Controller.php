<?php

namespace App\Http\Controllers;
use Jenssegers\Blade\Blade;
class Controller
{

    protected Blade $blade;
    public function __construct()
    {
        $this->blade = new Blade(__DIR__.'/resources/views', 'cache');
    }

}