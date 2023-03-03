<?php
$regions = Region::getAll();
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $name =  $_POST['district'];
    $region_id = $_POST['region_id'];
    District::createDistrict($region_id, $name);
}
?>

<form method="post" action="" class="w-50 mx-auto mt-5">
    <div class="mb-3">
        <label for="district" class="form-label">Tuman nomi</label>
        <input type="text" class="form-control" id="district" name="district" placeholder="Yangi Tuman Qoshing">
    </div>
    <div class="mb-3">
        <select class="form-select" name="region_id" id="">
            <option disabled>Qaysi Viloyatga qoshasiz</option>
            <? foreach ($regions as $region => $value): ?>
            <option value="<?= $value->id?>"><?= $value->name?></option>
            <? endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Qo`shish</button>
    </div>
</form>
