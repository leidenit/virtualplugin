<!-- Page: change lesson(изменить практикум) -->
<?php
include_once "init.php";
//Parse lesson id
parse_str($_SERVER['QUERY_STRING']);
$l_item = get_lesson($item_id, $pdo);
$selected_vm = get_lesson_selected_vm($item_id, $pdo);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Изменить практикум</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="update?item_id=<?= $item_id ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Название *</label>
                                        <input name="name" type="text" class="form-control"
                                               placeholder="Название практикума" value="<?= $l_item['name'] ?>"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Описание практикума *</label>
                                        <textarea name="description" rows="5" class="form-control"
                                                  placeholder="Введите описание практикума" value=""
                                                  required><?= $l_item['name'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Виртуальные машины</label>
                                        <select multiple class="form-control" name="selectvm[]" required>
                                            <?php foreach (get_vm_db_list(0, 100, $pdo) as $vm): ?>
                                                <option value="<?= $vm['id'] ?>"
                                                    <?php foreach ($selected_vm as $item) {
                                                        if ($item == $vm['id']) {
                                                            echo 'selected';
                                                        }
                                                    } ?>>
                                                    <?= $vm['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <p class="category">
                                            Нажмите <code>ctrl</code> для выбора нескольких виртуальных машин.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Изменить</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>