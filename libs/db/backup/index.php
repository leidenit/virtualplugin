<!-- Page: database backup -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Восстановление/архивирование базы данных
                        </h4>
                    </div>
                    <div class="content">
                        <div class="content">
                        <div class="row">
                            <form action="backup/db_upload/" method="post"
                                  enctype="multipart/form-data">
                                <label for="file">Название файла дампа базы данных:</label>
                                <input type="file" name="file" id="file" />
                                <br />
                                <button type="submit" name="submit" class="btn btn-info btn-fill" id="upload-dump">Загрузить дамп базы данных</button>
                                <button class="btn btn-info btn-fill" id="create-dump">Выгрузить дамп базы данных</button>
                            </form>
                        </div>


                        </div>

                    </div>
                    <div class="header">
                        <h4 class="title">Выгрузка медиа-информация и архивация данных
                        </h4>
                    </div>

                        <div class="content">
                            Вся медиа-информация хранится в папке images, вы можете скопировать вручную или воспользоватся функцией архивирования
                            <button class="btn btn-info btn-fill" id="create-archive">Создать архив медиа-информации</button> <button class="btn btn-info btn-fill" id="create_full_archive">Создать полный архив проекта</button>

                        </div>

                    <div class="header">
                        <h4 class="title">Выгрузка образов виртуальных машин
                        </h4>
                    </div>

                    <div class="content">
                        Для выгрузки образов виртуальных машин вы можете воспользоватся базовыми функциями интерфейса VirtialBox на сервере
                    </div>
                    </div>



            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $( document ).ready(function() {

        $("#create-dump").click(function (event) {
            event.preventDefault();
            document.location.href = 'db_dump/'
        });

        //Vm delete request
        $("#create-archive").click(function (event) {
            event.preventDefault();
            document.location.href = 'create_archive/'
        });

        $("#create_full_archive").click(function (event) {
            event.preventDefault();
            document.location.href = 'create_full_archive/'
        });

    });




</script>