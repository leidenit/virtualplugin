<!-- Add vm action -->
<?php
include_once "modules/vm/lib/functions.php";

//Parse vm id
$item_id = create_db_vm($_POST["name"], $_POST["os"], $_POST["property"], $_POST["description"], $pdo);
$form_c = get_db_vm($item_id, $pdo);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Вы создали шаблон виртуальной машины</h4>
                    </div>
                    <div class="content">
                        <lable><?= $form_c["name"] ?></lable>
                        <p><?= $form_c["os"] ?></p>
                        <p><?= $form_c["property"] ?></p>
                        <p><?= $form_c["description"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
