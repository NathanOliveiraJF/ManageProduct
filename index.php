<?php

session_start();
use Pecee\SimpleRouter\SimpleRouter;

require "./vendor/autoload.php";
require "./bootstrap.php";
require "./config/database.php";
require "blade.conf.php";

require "./vendor/pecee/simple-router/helpers.php";
require "routes/web.php";
require "./config.php";

SimpleRouter::start();


session_unset();
