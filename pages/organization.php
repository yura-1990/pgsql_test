<?php
$organizations = Organization::getAll();

if (isset($_POST['del'])){
    $id = $_POST['del'];
    Organization::destroy($id);
}
?>

<div class="bg-light vh-100 w-100 p-4 overflow-auto">
    <div class="d-flex align-items-center justify-content-between">
        <h1>Organizatsiyalar</h1>
        <a href="/createOrganization" class="btn btn-primary">Organizatsiya qo`shish</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th>№</th>
            <th>Organizasiya Nomi</th>
            <th>Tuman Nomi</th>
            <th>Viloyat Nomi</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($organizations as $organization => $value):?>
            <tr>
                <td><?= $organization+1?></td>
                <td><?= $value->organization_name?></td>
                <td><?= $value->district_name?></td>
                <td><?= $value->name?></td>
                <td class="d-flex gap-3">
                    <a class="btn btn-success" href="/editOrganization&id=<?= $value->id?>">Edit</a>
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