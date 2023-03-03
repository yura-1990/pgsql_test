<?php
$regions = Region::getAll();
$districts = District::getAll();
$organizations = Organization::getAll();
$id = $_GET['id'];
$store = Store::edit($id);

if ($_SERVER['REQUEST_METHOD']==='POST'){
    $id = $_POST['id'];
    $region_id = $_POST['region_id'];
    $district_id =  $_POST['district_id'];
    $organization_id =  $_POST['organization_id'];
    $store_name =  $_POST['store_name'];
    $debit =  $_POST['debit'];
    $kredit =  $_POST['kredit'];
    Store::update($id, $region_id, $district_id, $organization_id, $store_name, $debit, $kredit);
}
?>


<form method="post" action="" class="w-50 mx-auto mt-5">
    <div class="mb-3">
        <input type="hidden" value="<?= $id?>" name="id"/>
        <label for="store" class="form-label">Sklad nomi</label>
        <input type="text" value="<?= $store->store_name?>" class="form-control" id="store" name="store_name" placeholder="Yangi Sklad Qoshing">
    </div>
    <div class="mb-3">
        <select class="form-select" name="region_id" id="">
            <option hidden >Qaysi Viloyatga qoshasiz</option>
            <? foreach ($regions as $region => $value): ?>
                <option <?= $value->name===$store->name ? 'selected' : ''?> value="<?= $value->id?>"><?= $value->name?></option>
            <? endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <select class="form-select" name="district_id" id="">
            <option hidden>Qaysi Tumanga qoshasiz</option>
            <? foreach ($districts as $district => $value): ?>
                <option <?= $value->district_name===$store->district_name ? 'selected' : ''?> value="<?= $value->id?>"><?= $value->district_name?></option>
            <? endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <select class="form-select" name="organization_id" id="">
            <option hidden>Qaysi Organizatsiyaga qoshasiz</option>
            <? foreach ($organizations as $organization => $value): ?>
                <option <?= $value->organization_name===$store->organization_name ? 'selected' : ''?> value="<?= $value->id?>"><?= $value->organization_name?></option>
            <? endforeach; ?>
        </select>
    </div>

    <div class="d-flex gap-3">
        <div class="mb-3 w-100">
            <label for="debit" class="form-label">Kirim qancha?</label>
            <input type="number" value="<?= $store->debit ?>" class="form-control" id="debit" name="debit" placeholder="Kirim Qoshing">
        </div>
        <div class="mb-3 w-100">
            <label for="kredit" class="form-label">Chiqim qancha?</label>
            <input type="number" value="<?= $store->kredit ?>" class="form-control" id="kredit" name="kredit" placeholder="Chiqim Qoshing">
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Yangilash</button>
    </div>
</form>

