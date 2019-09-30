<?php

namespace Models;

class OrderDetail {
    public $id;
    public $order_id;

    //Product
    public $product_id;
    public $product;

    public $price;
    public $quantity;
    public $total;
    public $created_at;
    public $updated_at;
}