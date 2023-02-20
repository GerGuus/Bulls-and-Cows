<?php


session_start();
require dirname(__DIR__) . '/vendor/autoload.php';
use Dotenv\Dotenv;

// use Test;
$test = new \Test\TestClass();
$test->printfoo();
exit;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();




return [
	'host' => 'localhost',
	'user' => 'root',
	'db_password' => '',
	'db_name' => 'game-bd',
	'hash' => 'y13ugii12',
	'charset' => 'utf8mb4_0900_ai_ci'
];
