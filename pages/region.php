<?php
$regions = Region::getAll();

if (isset($_POST['del'])){
    $id = $_POST['del'];
    Region::destroy($id);
}
?>

<div class="bg-light vh-100 w-100 p-4 overflow-auto">
    <div class="d-flex align-items-center justify-content-between">
        <h1>Viloyatlar</h1>
        <a href="/createRegion" class="btn btn-primary">Viloyat qo`shish</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>№</th>
            <th>Viloyat Nomi</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($regions as $region => $value):?>
            <tr>
                <td><?= $region+1?></td>
                <td><?= $value->name?></td>
                <td class="d-flex gap-3">
                    <a class="btn btn-success" href="/editRegion&id=<?= $value->id?>">Edit</a>
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
