<?php

require '../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(['.', '..']);
$dotenv->load();
