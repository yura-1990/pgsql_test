<?php
$id = $_GET['id'];
$store = Store::edit($id);
$products = Product::getAll($id);
if (isset($_POST['del'])){
    $id = $_POST['del'];
    Product::destroy($id);
}
?>

<div class="bg-light vh-100 w-100 p-4 overflow-auto">
    <div class="d-flex align-items-center justify-content-between">
        <h1>Skladlar nomi <span class="text-danger text-capitalize"><?= count($products) > 0 ? $store->store_name:'' ?></span> </h1>
        <a href="/createProduct&id=<?=$id?>" class="btn btn-primary">Product qo`shish</a>
    </div>
    <? if (!count($products) > 0): ?>
        <h2>Hozircha bu skladda product yoq </h2>
    <? else: ?>
    <table class="table">
        <thead>
        <tr>
            <th>№</th>
            <th>Product Nomi</th>
            <th>Qancha Keldi</th>
            <th>Qancha Ketti</th>
            <th>Qancha Qoldi</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <? foreach ($products as $product => $value):?>
            <tr>
                <td><?= $product+1?></td>
                <td>
                    <a href="">
                        <?= $value->product_name?>
                    </a>
                </td>
                <td>
                    <?= $value->arrived?>
                </td>
                <td>
                    <?= $value->went?>
                </td>
                <td>
                    <?= $value->arrived - $value->went ?>
                </td>
                <td class="d-flex gap-3">
                    <a class="btn btn-success" href="/editProduct&id=<?= $value->id?>">Edit</a>
                    <form method="POST">
                        <input type="hidden" value="<?= $value->id?>" name="del"/>
                        <button class="btn btn-danger" >Delete</button>
                    </form>
                </td>
            </tr>
        <?endforeach;?>
        <? endif; ?>
        </tbody>
    </table>
</div>
</div>
