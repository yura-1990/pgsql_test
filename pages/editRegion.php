<?php
    $id = $_GET['id'];
    $editRegion = Region::edit($id);
    if ($_SERVER['REQUEST_METHOD']==='POST'){
        $name =  $_POST['region'];
        Region::update($id, $name);
    }
?>

<form method="post" action="" class="w-50 mx-auto mt-5">
    <div class="mb-3">
        <label for="region" class="form-label">Viloyat nomi</label>
        <input type="text" value="<?= $editRegion->name; ?>" class="form-control" id="region" name="region" placeholder="Yangi Volayat Qoshing">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Yangilash</button>
    </div>
</form>
