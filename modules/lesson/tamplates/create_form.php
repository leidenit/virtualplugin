<!-- Create form (part of administration page) -->
<div class="card">
    <div class="header">
        <h4 class="title">Создать шаблон виртуальной среды</h4>
    </div>
    <div class="content">
        <form method="post" action="create" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Название *</label>
                        <input name="name" type="text" class="form-control" placeholder="Название шаблона виртуальной среды" value=""
                               required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Описание шаблона виртуальной среды *</label>
                        <textarea name="description" rows="5" class="form-control" id="main-text-edit"
                                  placeholder="Введите описание шаблона виртуальной среды" value="" required></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Картинка (топология,схема....)</label>
                        <input name="imageinput" type="file">
                        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Шаблоны ВМ *</label>
                        <select multiple class="form-control" name="selectvm[]" required>
                            <?php foreach (get_vm_db_list(0, 100, $pdo) as $vm): ?>
                                <option value="<?= $vm['id'] ?>"><?= $vm['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <p class="category">Нажмите <code>ctrl</code> для выбора нескольких шаблонов. </p>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-fill pull-right">Создать шаблон виртуальной среды</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>


<script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'main-text-edit' );
</script>