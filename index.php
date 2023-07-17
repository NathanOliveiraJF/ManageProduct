<?php

use Pecee\SimpleRouter\SimpleRouter;

require "./vendor/autoload.php";
require "./bootstrap.php";
require "./config/database.php";
require "./vendor/pecee/simple-router/helpers.php";
require "./routes/web.php";

SimpleRouter::start();


//$viewData = \App\Models\Category::all();
//$data = [
//    'categories' => $viewData
//];

//echo $blade->make('categories.index', $data)->render();