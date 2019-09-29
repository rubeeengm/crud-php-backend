<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

use Services\ProductService;

$productService = new ProductService();
$result = $productService->getAll();

var_dump($result);