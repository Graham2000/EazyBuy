<?php
define('APP_ROOT', dirname(__FILE__, 2));

spl_autoload_register(function ($class_name) {
    include APP_ROOT . "/src/classes/" . $class_name . '.php';
});


$cart = new Cart();
$user = new User();

include("./includes/header.php");
include("./includes/nav.php");