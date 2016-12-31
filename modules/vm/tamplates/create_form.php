<!-- Create form (part of vm page) -->
<div class="card">
    <div class="header">
        <h4 class="title">Создать шаблон виртуальной машины</h4>
    </div>
    <div class="content">
        <form method="post" action="create">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Название виртуальной машины (virtualbox - <b>уникальное</b>) *</label>
                        <input name="name" type="text" class="form-control" placeholder="Название" value=""
                               required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Опирационная система</label>
                        <input name="os" type="text" class="form-control" placeholder="Название опирационной системы"
                               value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Параметры системы</label>
                        <input name="property" type="text" class="form-control"
                               placeholder="Паваметры виртуальной машины" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea name="description" rows="5" class="form-control"
                                  placeholder="Описание виртуальной машины" value=""></textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info btn-fill pull-right">Создать</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>