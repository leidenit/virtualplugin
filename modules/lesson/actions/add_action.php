<!-- Add lesson action -->
<?php
include_once "modules/lesson/lib/functions.php";

//Parse lesson id
$item_id = create_lesson($_POST["name"], $_POST["description"], $_POST["selectvm"], $pdo);
$form_c = get_lesson($item_id, $pdo);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Вы создали виртуальную среду</h4>
                    </div>
                    <div class="content">
                        <h4><?= $form_c["name"] ?></h4>
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
