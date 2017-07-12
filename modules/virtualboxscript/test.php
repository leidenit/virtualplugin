<?php include 'functions.php'; ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">

                <div class="card">
                    <div class="header">
                        <h4 class="title"> Тест систем virtualbox</h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $vbox_m_predict = "/Applications/VirtualBox.app/Contents/MacOS/VBoxManage";
                                $vbox_h_predict = "/Applications/VirtualBox.app/Contents/MacOS/VBoxHeadless";

                                echo "Версия php:" . phpversion() . "</br>";
                                echo "--  Список виртуальных машин (предикт) --</br>";
                                print_r(get_vm_list($vbox_m_predict));
                                echo "</br>--  Создание виртуальной машины (предикт) --</br>";
                                echo create_vm('test2', true, 4, 'Windows-2008-64bit', '', 1024, $vbox_m_predict);
                                echo "</br>--  Клонирование виртуальной машины (предикт) --</br>";
                                echo clone_vm('Ubuntu', '12ss3', $vbox_m_predict);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>