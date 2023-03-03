<?php

class Region
{
    public static $pdo;
    public $id;
    public $name;

    public static function getAll()
    {
        $query = "SELECT * FROM region ORDER BY id ASC;";
        $region = self::$pdo->prepare($query);
        $region->execute([]);
        return $region->fetchAll(PDO::FETCH_OBJ);
    }

    public static function createRegion($name){
        $query = "INSERT INTO region (name) VALUES (?);";
        $region = self::$pdo->prepare($query);
        $region->execute([$name]);
        return header('Location: /');
    }

    public static function edit($id){
        $query = "SELECT * FROM region WHERE id=?";
        $region = self::$pdo->prepare($query);
        $region->execute([$id]);
        return $region->fetch(PDO::FETCH_OBJ);
    }

    public static function update($id, $name){
        $query = "UPDATE region SET name = ? WHERE id=?;";
        $region = self::$pdo->prepare($query);
        $region->execute([$name,$id]);
        return header('Location: /');
    }

    public static function destroy($id){
        $query = "DELETE FROM region WHERE id=?;";
        $region = self::$pdo->prepare($query);
        $region->execute([$id]);
        return header('Location: /');
    }





}