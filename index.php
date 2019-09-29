<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

use Models\Product;
use Services\ProductService;

$productService = new ProductService();

$model = new Product;
$model->name = 'Guitarra Suhr';
$model->price = 3000;

$result = $productService->create($model);

var_dump($result);