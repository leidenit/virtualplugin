<!-- Add lesson action -->
<?php
include_once "modules/lesson/lib/functions.php";
define ('SITE_ROOT', realpath(dirname(__FILE__)));
$uploaddir = '/../../../images/';
$ffname = md5(microtime() . rand(0, 9999)) . basename($_FILES['imageinput']['name']);
$uploadfile = $uploaddir . $ffname;


move_uploaded_file($_FILES['imageinput']['tmp_name'], SITE_ROOT . $uploadfile);



//Parse lesson id
$item_id = create_lesson($_POST["name"], $_POST["description"], $_POST["selectvm"],"/virtualplugin/images/" . $ffname, $pdo);
$form_c = get_lesson($item_id, $pdo);
?>


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Вы создали Шаблон виртуальной среды</h4>
                    </div>
                    <div class="header">
                        <span class="title" style="color: darkgrey;">Название</span>
                    </div>
                    <div class="content" style="font-size: 20px; margin-top: -10px;">
                        <?= $form_c["name"] ?>
                    </div>

                    <div class="header">
                        <span class="title" style="color: darkgrey;">Картинка</span>
                    </div>
                    <div class="content" style="font-size: 20px; margin-top: -10px; text-align: center;">
                        <img src="<?=$form_c['image']?>">
                    </div>

                    <div class="header">
                        <span class="title" style="color: darkgrey;">Описание</span>
                    </div>
                    <div class="content ls-descr" style="margin-top: -10px;">
                        <?= $form_c['description'] ?>
                    </div>

                    <div class="header">
                        <span class="title" style="color: darkgrey;">Виртуальные машины</span>
                    </div>
                    <div class="content" style="margin-top: -10px;">
                        <ul>
                            <?php foreach (get_name_selected_lesson_vm($_POST["selectvm"], $pdo) as $key => $vm): ?>
                                <li><?= $vm["name"] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="content">

                        <a class="btn btn-info btn-fill pull-right" href="/virtual/administration/" >Назад к списку шаблонов</a>
                        </br>
                        </br>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
