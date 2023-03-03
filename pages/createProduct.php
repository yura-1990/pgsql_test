<?php

$id = $_GET['id'];
$store = Store::edit($id);

if ($_SERVER['REQUEST_METHOD']==='POST'){
    $store_id = $_POST['store_id'];
    $product_name = $_POST['product_name'];
    $arrived = $_POST['arrived'];
    $went = $_POST['went'];

    Product::createProduct($store_id, $product_name, $arrived, $went);
}
?>

<form method="POST" action="" class="w-50 mx-auto mt-5">
    <h1 class="mb-5">Sklad <span class="text-danger"><?= $store->store_name?></span></h1>
    <div class="mb-3">
        <input type="hidden" value="<?= $id?>" name="store_id"/>
        <label for="store" class="form-label">Product nomi</label>
        <input type="text" class="form-control" id="store" name="product_name" placeholder="Yangi Product Qoshing">
    </div>

    <div class="d-flex gap-3">
        <div class="mb-3 w-100">
            <label for="arrived" class="form-label">Qancha Keldi?</label>
            <input type="number" class="form-control" id="arrived" name="arrived" placeholder="Chiqim Qoshing">
        </div>
        <div class="mb-3 w-100">
            <label for="went" class="form-label">Qancha Ketti?</label>
            <input type="number" class="form-control" id="went" name="went" placeholder="Kirim Qoshing">
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Qo`shish</button>
    </div>
</form>
