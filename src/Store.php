<?php

class Store
{

    public static $pdo;
    public $id;
    public $region_id;
    public $district_id;
    public $organization_id;
    public $store_name;
    public $debit;
    public $kredit;

    public static function getAll()
    {
        $query = "SELECT store.id, store.store_name, store.debit, store.kredit, organizations.organization_name, districts.district_name, region.name 
                  FROM store 
				  JOIN organizations ON (store.organization_id=organizations.id)
                  JOIN districts ON (store.district_id=districts.id)
                  JOIN region ON (store.region_id=region.id)
                  ORDER BY id ASC;";
        $region = self::$pdo->prepare($query);
        $region->execute([]);
        return $region->fetchAll(PDO::FETCH_OBJ);
    }

    public static function createStore($region_id, $district_id, $organization_id, $store_name, $debit, $kredit){
        $query = "INSERT INTO store (region_id, district_id, organization_id, store_name, debit, kredit) VALUES (?,?,?,?,?,?);";
        $region = self::$pdo->prepare($query);
        $region->execute([$region_id, $district_id, $organization_id, $store_name, $debit, $kredit]);
        return header('Location: /store');
    }

    public static function edit($id){
        $query = "SELECT store.id, store.store_name, store.debit, store.kredit, organizations.organization_name, districts.district_name, region.name 
                  FROM store 
				  JOIN organizations ON (store.organization_id=organizations.id)
                  JOIN districts ON (store.district_id=districts.id)
                  JOIN region ON (store.region_id=region.id)
				  WHERE organizations.id=?
                  ORDER BY id ASC;";
        $region = self::$pdo->prepare($query);
        $region->execute([$id]);
        return $region->fetch(PDO::FETCH_OBJ);
    }

    public static function update($id, $region_id, $district_id, $organization_id, $store_name, $debit, $kredit){
        $query = "UPDATE store SET region_id=?, district_id=?, organization_id=?, store_name=?, debit=?, kredit=? WHERE id=?;";
        $region = self::$pdo->prepare($query);
        $region->execute([$region_id, $district_id, $organization_id, $store_name, $debit, $kredit, $id]);
        return header('Location: /store');
    }

    public static function destroy($id){
        $query = "DELETE FROM store WHERE id=?;";
        $region = self::$pdo->prepare($query);
        $region->execute([$id]);
        return header('Location: /store');
    }

}