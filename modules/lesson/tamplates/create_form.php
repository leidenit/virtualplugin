<!-- Create form (part of administration page) -->
<div class="card">
    <div class="header">
        <h4 class="title">Создать практикум</h4>
    </div>
    <div class="content">
        <form method="post" action="create">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Название *</label>
                        <input name="name" type="text" class="form-control" placeholder="Название практикума" value=""
                               required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Описание урока *</label>
                        <textarea name="description" rows="5" class="form-control"
                                  placeholder="Введите описание практикума" value="" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Виртуальные машины *</label>
                        <select multiple class="form-control" name="selectvm[]" required>
                            <?php foreach (get_vm_db_list(0, 100, $pdo) as $vm): ?>
                                <option value="<?= $vm['id'] ?>"><?= $vm['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <p class="category">Нажмите <code>ctrl</code> для выбора нескольких виртуальных машин. </p>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-fill pull-right">Создать практикум</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>