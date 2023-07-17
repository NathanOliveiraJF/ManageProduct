<?php
require "./vendor/autoload.php";
require "./bootstrap.php";
require "./config/database.php";

use Jenssegers\Blade\Blade;
$blade = new Blade(__DIR__.'/resources/views', 'cache');

$viewData = \App\Models\Category::all();
$data = [
    'categories' => $viewData
];

echo $blade->make('categories.index', $data)->render();