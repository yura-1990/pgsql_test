<?php

$id = $_GET['id'];
$store = Store::edit($id);

$product = Product::edit($id);
if ($_SERVER['REQUEST_METHOD']==='POST'){
    $store_id = $_POST['store_id'];
    $product_name = $_POST['product_name'];
    $arrived = strval($_POST['arrived']);
    $went = $_POST['went'];

    Product::update($id, $store_id, $product_name, $arrived, $went);
}
?>

<form method="POST" action="" class="w-50 mx-auto mt-5">
    <h1 class="mb-5">Sklad <span class="text-danger"><?= $product ? $product->store_name:'' ?></span></h1>
    <div class="mb-3">
        <input type="hidden" value="<?= $product->store_id?>" name="store_id"/>
        <label for="product_name" class="form-label">Product nomi</label>
        <input type="text" value="<?= $product->product_name ?>" class="form-control" id="product_name" name="product_name" placeholder="Yangi Product Qoshing">
    </div>

    <div class="d-flex gap-3">
        <div class="mb-3 w-100">
            <label for="arrived" class="form-label">Qancha Keldi?</label>
            <input type="number" value="<?= intval($product->arrived) ?>" class="form-control" id="arrived" name="arrived" placeholder="Chiqim Qoshing">
        </div>
        <div class="mb-3 w-100">
            <label for="went" class="form-label">Qancha Ketti?</label>
            <input type="number" value="<?= $product->went ?>" class="form-control" id="went" name="went" placeholder="Kirim Qoshing">
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Yangilash</button>
    </div>
</form>
