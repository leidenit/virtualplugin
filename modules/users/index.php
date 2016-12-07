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
                                Последний заход: <?= $vuser->dbdescriptor["ldate"] ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                Вы впервые появились в системе: <?= $vuser->dbdescriptor["fdate"] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>