<?php

class Organization
{

    public static $pdo;
    public $id;
    public $region_id;
    public $district_id;
    public $organization_name;

    public static function getAll()
    {
        $query = "SELECT organizations.id, organizations.organization_name, districts.district_name, region.name 
                  FROM organizations 
                  JOIN districts ON (organizations.district_id=districts.id)
                  JOIN region ON (organizations.region_id=region.id)
                  ORDER BY id ASC;";
        $region = self::$pdo->prepare($query);
        $region->execute([]);
        return $region->fetchAll(PDO::FETCH_OBJ);
    }

    public static function createOrganization($region_id,$district_id,$organization_name){
        $query = "INSERT INTO organizations (region_id, district_id, organization_name) VALUES (?,?,?);";
        $region = self::$pdo->prepare($query);
        $region->execute([$region_id, $district_id, $organization_name]);
        return header('Location: /organization');
    }

    public static function edit($id){
        $query = "SELECT organizations.id, organizations.organization_name, districts.district_name, region.name FROM organizations 
                  JOIN districts ON (organizations.district_id=districts.id)
                  JOIN region ON (organizations.region_id=region.id)
				  WHERE organizations.id=?
                  ORDER BY id ASC;";
        $region = self::$pdo->prepare($query);
        $region->execute([$id]);
        return $region->fetch(PDO::FETCH_OBJ);
    }

    public static function update($id, $region_id, $district_id, $organization_name){
        $query = "UPDATE organizations SET region_id=?, district_id=?, organization_name=? WHERE id=?;";
        $region = self::$pdo->prepare($query);
        $region->execute([$region_id, $district_id, $organization_name, $id]);
        return header('Location: /organization');
    }

    public static function destroy($id){
        $query = "DELETE FROM organizations WHERE id=?;";
        $region = self::$pdo->prepare($query);
        $region->execute([$id]);
        return header('Location: /organization');
    }

}