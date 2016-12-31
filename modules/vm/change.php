<!-- Page: change vm(изменить виртуальную машину) -->
<?php
include_once "init.php";
//Parse vm id
parse_str($_SERVER['QUERY_STRING']);
$l_item = get_db_vm($item_id, $pdo);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Изменить шаблон виртуальной машины</h4>
                    </div>
                    <div class="content">
                        <form method="post" action="update?item_id=<?= $item_id ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Название виртуальной машины (virtualbox - <b>уникальное</b>) *</label>
                                        <input name="name" type="text" class="form-control"
                                               placeholder="Название виртуальной машины" value="<?= $l_item['name'] ?>"
                                               required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Опирационная система</label>
                                        <input name="os" type="text" class="form-control"
                                               placeholder="Название опирационной системы" value="<?= $l_item['os'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Параметры системы</label>
                                        <input name="property" type="text" class="form-control"
                                               placeholder="Паваметры виртуальной машины"
                                               value="<?= $l_item['property'] ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Описание</label>
                                        <textarea name="description" rows="5" class="form-control"
                                                  placeholder="Комманды для запуска виртуальных машин"
                                                  value=""><?= $l_item['property'] ?>
                                                </textarea>
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