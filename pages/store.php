<?php
$stores = Store::getAll();

if (isset($_POST['del'])){
    $id = $_POST['del'];
    Store::destroy($id);
}
?>

<div class="bg-light vh-100 w-100 p-4 overflow-auto">
    <div class="d-flex align-items-center justify-content-between">
        <h1>Skladlar</h1>
        <a href="/createStore" class="btn btn-primary">Sklad qo`shish</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>№</th>
            <th>Sklad Nomi</th>
            <th>Organizatsiya Nomi</th>
            <th>Tuman Nomi</th>
            <th>Viloyat Nomi</th>
            <th>Kirim</th>
            <th>Chiqim</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($stores as $store => $value):?>
            <tr>
                <td><?= $store+1?></td>
                <td>
                    <a href="/product&id=<?= $value->id?>">
                        <?= $value->store_name?>
                    </a>
                </td>
                <td><?= $value->organization_name?></td>
                <td><?= $value->district_name?></td>
                <td><?= $value->name?></td>
                <td><?= $value->debit?></td>
                <td><?= $value->kredit?></td>
                <td class="d-flex gap-3">
                    <a class="btn btn-success" href="/editStore&id=<?= $value->id?>">Edit</a>
                    <form method="POST">
                        <input type="hidden" value="<?= $value->id?>" name="del"/>
                        <button class="btn btn-danger" >Delete</button>
                    </form>
                </td>
            </tr>
        <?endforeach;?>
        </tbody>
    </table>
</div>
</div>