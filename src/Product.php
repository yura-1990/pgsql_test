<?php

class Product
{

    public static $pdo;
    public $id;
    public $store_id;
    public $product_name;
    public $arrived;
    public $went;

    public static function getAll($store_id)
    {
        $query = "SELECT products.id, products.store_id, products.product_name, products.arrived, products.went, store.store_name 
                  FROM products 
				  JOIN store ON (products.store_id=store.id)
				  WHERE products.store_id=?
                  ORDER BY id ASC;";
        $region = self::$pdo->prepare($query);
        $region->execute([$store_id]);
        return $region->fetchAll(PDO::FETCH_OBJ);
    }

    public static function createProduct($store_id, $product_name, $arrived, $went){
        $query = "INSERT INTO products (store_id, product_name, arrived, went) VALUES (?,?,?,?);";
        $region = self::$pdo->prepare($query);
        $region->execute([$store_id, $product_name, $arrived, $went]);
        return header("Location: /product&id=$store_id");
    }

    public static function edit($id){
        $query = "SELECT products.id, products.store_id, products.product_name, products.arrived, products.went, store.store_name 
                  FROM products 
				  JOIN store ON (products.store_id=store.id)
				  WHERE products.id=?
                  ORDER BY id ASC;";
        $region = self::$pdo->prepare($query);
        $region->execute([$id]);
        return $region->fetch(PDO::FETCH_OBJ);
    }

    public static function update($id, $store_id, $product_name, $arrived, $went)
    {
        $query = "UPDATE products SET store_id=?, product_name=?, arrived=?, went=? WHERE id=?;";
        $region = self::$pdo->prepare($query);
        $region->execute([$store_id, $product_name, $arrived, $went, $id]);

        return header("Location: /product&id=$store_id");
    }

    public static function destroy($id){
        $query = "DELETE FROM products WHERE id=?;";
        $region = self::$pdo->prepare($query);
        $region->execute([$id]);
        return header("Location: /product&id=$id");
    }

}