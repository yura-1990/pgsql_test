<?php
$regions = Region::getAll();
$id = $_GET['id'];
$editDistrict = District::edit($id);

if ($_SERVER['REQUEST_METHOD']==='POST'){
    $id = $_POST['id'];
    $district_name =  $_POST['district_name'];
    $region_id =  $_POST['region_id'];
    District::update($id, $region_id, $district_name);
}
?>

<form method="post" action="" class="w-50 mx-auto mt-5">
    <div class="mb-3">
        <input type="hidden" value="<?= $id?>" name="id"/>
        <label for="region" class="form-label">Viloyat nomi</label>
        <input type="text" value="<?= $editDistrict->district_name; ?>" class="form-control" id="district" name="district_name" placeholder="Yangi Volayat Qoshing">
    </div>
    <div class="mb-3">
        <select class="form-select" name="region_id" id="">
            <? foreach ($regions as $region => $value): ?>
                <option <?= $editDistrict->name === $value->name ? 'selected' : ''?> value="<?= $value->id?>"><?= $value->name?></option>
            <? endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Yangilash</button>
    </div>
</form>

