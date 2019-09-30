<?php

namespace Models;

class Order {
    public $id;

    //User client
    public $user_id;
    public $client;

    public $total = 0;

    //User creator
    public $creater_id;
    public $creater;

    public $created_at;
    public $updated_at;
    
    //Order detail
    public $detail = [];
}