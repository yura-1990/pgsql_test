<?php
$regions = Region::getAll();
$districts = District::getAll();
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $region_id = $_POST['region_id'];
    $district_id =  $_POST['district_id'];
    $organization_name =  $_POST['organization_name'];
    Organization::createOrganization($region_id, $district_id, $organization_name);
}
?>

<form method="post" action="" class="w-50 mx-auto mt-5">
    <div class="mb-3">
        <label for="organization" class="form-label">Organizatsiya nomi</label>
        <input type="text" class="form-control" id="organization" name="organization_name" placeholder="Yangi Organizatsiya Qoshing">
    </div>
    <div class="mb-3">
        <select class="form-select" name="region_id" id="">
            <option disabled >Qaysi Viloyatga qoshasiz</option>
            <? foreach ($regions as $region => $value): ?>
                <option value="<?= $value->id?>"><?= $value->name?></option>
            <? endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <select class="form-select" name="district_id" id="">
            <option disabled>Qaysi Tumanga qoshasiz</option>
            <? foreach ($districts as $district => $value): ?>
                <option value="<?= $value->id?>"><?= $value->district_name?></option>
            <? endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Qo`shish</button>
    </div>
</form>
