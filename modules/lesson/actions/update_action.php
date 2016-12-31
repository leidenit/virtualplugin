<!-- Update lesson action -->
<?php
include_once "modules/lesson/lib/functions.php";

//Parse lesson id
parse_str($_SERVER['QUERY_STRING']);
update_lesson($_POST["name"], $_POST["description"], $_POST["selectvm"], $item_id, $pdo);
$form_c = get_lesson($item_id, $pdo);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Вы обновили виртуальную среду</h4>
                    </div>
                    <div class="content">
                        <lable><?= $form_c["name"] ?></lable>
                        <p><?= $form_c["description"] ?></p>
                        <lable>Вы выбрали шаблоны ВМ:</lable>
                        <ul>
                            <?php foreach (get_name_selected_lesson_vm($_POST["selectvm"], $pdo) as $key => $vm): ?>
                                <li><?= $vm["name"] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
