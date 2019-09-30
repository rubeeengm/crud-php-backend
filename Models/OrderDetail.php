<?php

namespace Models;

class OrderDetail {
    public $id;
    public $order_id;
    public $product_id;
    public $price;
    public $quantity;
    public $total;
    public $created_at;
    public $updated_at;
}