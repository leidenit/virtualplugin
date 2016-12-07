<!-- Page: lesson-administration(администрирование) -->
<?php
include_once "init.php";
$vm_lesson_list = get_lesson_list(0, 100, $pdo);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="header">
                        <h4 class="title">Список практикумов</h4>
                        <p class="category">Вы можете их редактировать</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <?php if (count($vm_lesson_list) == 0): ?>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        В базе отсутствуют практикумы!
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Название</th>
                                        <th colspan="2">Операции</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($vm_lesson_list as $key => $lesson): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $lesson['name'] ?></td>
                                        <td>
                                            <a href="/virtual/administration/change/?item_id=<?= $lesson['id'] ?>">
                                                <i class="pe-7s-tools"></i> Редактировать
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
                <?php include "modules/lesson/tamplates/create_form.php"; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
//Vm delete request
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