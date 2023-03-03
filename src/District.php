<?php

class District
{

    public static $pdo;
    public $id;
    public $region_id;
    public $name;

    public static function getAll()
    {
        $query = "SELECT districts.id, districts.district_name, region.name FROM districts 
        LEFT JOIN region ON districts.region_id=region.id ORDER BY id ASC;";
        $region = self::$pdo->prepare($query);
        $region->execute([]);
        return $region->fetchAll(PDO::FETCH_OBJ);
    }

    public static function createDistrict($region_id,$district_name){
        $query = "INSERT INTO districts (region_id, district_name) VALUES (?,?);";
        $region = self::$pdo->prepare($query);
        $region->execute([$region_id,$district_name]);
        return header('Location: /district');
    }

    public static function edit($id){
        $query = "SELECT districts.id, districts.district_name,  region.name FROM districts 
        LEFT JOIN region ON districts.region_id=region.id WHERE districts.id=?;";
        $region = self::$pdo->prepare($query);
        $region->execute([$id]);
        return $region->fetch(PDO::FETCH_OBJ);
    }

    public static function update($id, $region_id, $district_name){
        $query = "UPDATE districts SET region_id=?, district_name=? WHERE id=?;";
        $region = self::$pdo->prepare($query);
        $region->execute([$region_id, $district_name, $id]);
        return header('Location: /district');
    }

    public static function destroy($id){
        $query = "DELETE FROM districts WHERE id=?;";
        $region = self::$pdo->prepare($query);
        $region->execute([$id]);
        return header('Location: /district');
    }

}