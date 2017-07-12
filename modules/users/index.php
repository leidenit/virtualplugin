<!-- Page: user(пользователь) -->
<?php include_once "init.php" ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Вы вошли в систему как <b><?= $USER->firstname ?> <?= $USER->lastname ?></b>
                        </h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                Последний появление: <?= $vuser->dbdescriptor["ldate"] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                Первое появление: <?= $vuser->dbdescriptor["fdate"] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                Права доступа:
                                <b>
                                <?php if ($isadmin): ?>
                                    Администратор
                                <?php else: ?>
                                    Обычный пользователь
                                <?php endif; ?>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>