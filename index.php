<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

require 'config/jwt.php';
require 'config/auth.php';
require 'config/database.php';
require_once 'config/response.php';
require_once 'config/messages.php';
require 'routes/api.php';
require 'routes/web.php';
require 'config/routes.php';
