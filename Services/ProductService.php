<?php

namespace Services;

use PDO;
use PDOException;
use Models\Product;
use Database\DbProvider;

class ProductService {
    private $_db;

    public function __construct() {
        $this->_db = DbProvider::get();
    }

    public function getAll() : Array {
        $result = [];

        try {
            $stm = $this->_db->prepare('select * from products');

            $stm->execute();

            $result = $stm->fetchAll(PDO::FETCH_CLASS, '\\Models\\Product');
        } catch(PDOException $ex) {
            var_dump($ex);
        }

        return $result;
    }

    public function get(int $id) : ?Product {
        $result = null;

        try {
            $stm = $this->_db->prepare('select * from products where id = :id');

            $stm->execute(['id' => $id]);
            $data = $stm->fetchObject('\\Models\\Product');

            if($data) {
                 $result = $data;
            }
        } catch(PDOException $ex) {
            var_dump($ex);
        }

        return $result;
    }

    public function create(Product $model): void {
        try {
            $stm = $this->_db->prepare(
                'insert into products(name, price, created_at, updated_at) values (:name, :price, :created, :updated)'
            );

            $now = date('Y-m-d H:i:s');

            $stm->execute([
                'name' => $model->name
                , 'price' => $model->price
                , 'created' => $now
                , 'updated' => $now
            ]);
        } catch(PDOException $ex) {
            var_dump($ex);
        }
    }

    public function update(Product $model) : void {
        try {
            $stm = $this->_db->prepare('
                update products
                set name = :name
                , price = :price
                , updated_at = :updated
                where id = :id
            ');

            $stm->execute([
                'id' => $model->id
                , 'name' => $model->name
                , 'price' => $model->price
                , 'updated' => date('Y-m-d H:i:s')
            ]);
        } catch(PdoException $ex) {
            var_dump($ex);
        }
    }

    public function delete(int $id) : void {
        try {
            $stm = $this->_db->prepare(
                'delete from products where id = :id'
            );

            $stm->execute(['id' => $id]);
        } catch(PDOException $ex) {
            var_dump($ex);
        }
    }
}