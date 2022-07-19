<?php
// Router
session_start();
require_once realpath(__DIR__.'/vendor/autoload.php');

use App\Service\Router;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
$db = getenv("DATABASE_HOST");


$url = $_GET['url'] ?? "home";

$router = new Router();
$router->executePath($url);


