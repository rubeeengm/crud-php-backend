<?php

require_once 'vendor/autoload.php';
require_once 'config.php';

use Models\Product;
use Services\ProductService;

$productService = new ProductService();

$model = new Product;
$model->id = 13;
$model->name = 'Guitarra Suhrx';
$model->price = 30001;

$result = $productService->delete(13);

var_dump($result);