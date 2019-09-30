<?php

namespace Models;

class Order {
    public $id;
    public $user_id;
    public $total = 0;
    public $creater_id;
    public $created_at;
    public $updated_at;
    //Order detail
    public $detail = [];
}