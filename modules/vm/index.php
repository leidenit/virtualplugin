<!-- Page: virtual machines(виртуальные машины) -->
<?php
include_once "init.php";
$vm_item_list = get_vm_db_list(0, 100, $pdo);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Список виртуальных машин</h4>
                        <p class="category">Вы можете их редактировать</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <?php if (count($vm_item_list) == 0): ?>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        В базе отсутствуют виртуальные машины!
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Название</th>
                                        <th>Статус</th>
                                        <th colspan="2">Операции</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($vm_item_list as $key => $lesson): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $lesson['name'] ?></td>
                                        <td>
                                            <?php
                                            if (is_vm($lesson['name'], $vbox_m_predict)) {
                                                echo '<i class="pe-7s-angle-down-circle"> Активна</i>';
                                            } else {
                                                echo '<i class="pe-7s-close"> Не существует</i>';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="/virtual/virtualmachines/change/?item_id=<?= $lesson['id'] ?>">
                                                <i class="pe-7s-tools"></i> Изменить
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" class="delete_lesson" data-id="<?= $lesson['id'] ?>">
                                                <i class="pe-7s-trash"></i> Удалить
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <?php include "modules/vm/tamplates/create_form.php"; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Delete vm event
    $(".delete_lesson").click(function (event) {
        event.preventDefault();
        var el_r = $(this);
        $.ajax({
            url: 'delete?item_id=' + $(this).attr("data-id"),
            success: function (data) {
                el_r.parent().parent().remove();
                console.log(data);
            }
        });
    });
</script>