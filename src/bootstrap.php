<?php
define('APP_ROOT', dirname(__FILE__, 2));
require APP_ROOT . '/src/config.php';

spl_autoload_register(function ($class_name) {
    include APP_ROOT . "/src/classes/" . $class_name . '.php';
});

$database = new Database($dsn, $username, $password);