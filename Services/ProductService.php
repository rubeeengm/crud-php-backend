<?php

namespace Services;

use PDO;
use PDOException;
use Database\DbProvider;

class ProductService {
    private $_db;

    public function __construct() {
        $this->_db = DbProvider::get();
    }

    public function getAll() {
        $result = [];

        try {
            $stm = $this->_db->prepare('select * from products');

            $stm->execute();

            $result = $stm->fetchAll(PDO::FETCH_CLASS, '\\Models\\Product');
        } catch(PDOException $ex) {
            
        }
        
        return $result;
    }
}