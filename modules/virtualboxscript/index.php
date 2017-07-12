<!-- Page: start-virtual-lesson -->
<?php
include_once 'functions.php';
include_once 'modules/lesson/lib/functions.php';

//parse lesson id
parse_str($_SERVER['QUERY_STRING']);
$current_lesson = $item_id;
$lesson_obj = get_lesson($current_lesson,$pdo);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">


                    <div class="header">
                        <span class="title" style="color: darkgrey;">Название</span>
                    </div>
                    <div class="content" style="font-size: 20px; margin-top: -10px;">
                        <?= $lesson_obj['name'] ?>
                    </div>
                    <div class="header">
                        <span class="title" style="color: darkgrey;">Картинка</span>
                    </div>
                    <div class="content" style="font-size: 20px; margin-top: -10px; text-align: center;">
                        <img src="<?=$lesson_obj['image']?>">
                    </div>
                    <div class="header">
                        <span class="title" style="color: darkgrey;">Доступы к виртуальным машинам:</span>
                    </div>
                    <div class="content" style=" margin-top: -10px;">
                        <div class="row">
                            <div class="col-md-12">



                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Название</th>
                                        <th>RDP</th>
                                        <th>Shh</th>
                                        <th>Статус</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                <?php
                                $vm_list = $vuser->check_vm($current_lesson);
                                foreach (get_name_lesson_vm($current_lesson, $pdo) as $item) {

                                    $vm_name = $item . $vuser->vid . $current_lesson;
                                    $vm_name[0] = "c";
                                    $flag = true;
                                    foreach ($vm_list as $v_item) {
                                        if ($v_item['name'] == $vm_name) {
                                            $flag = false;
                                        }
                                    }
                                    if ($flag) {
                                        $vuser->create_vm($current_lesson, $vm_name);
                                    }
                                    if (!is_vm($vm_name, $vbox_m_predict)) {
                                        if (!is_vm($item, $vbox_m_predict)) {
                                            echo "<span style='color:red'>Виртуальная машина-родитель <b>" . $item . "</b> отсутствует в системе!</br></span>";
                                        }

                                        clone_vm($item, $vm_name, $vbox_m_predict);
                                    }
                                }
                                $vm_user_list = $vuser->get_vm_lesson_list($current_lesson);
				$increment = 0;
                                foreach ($vm_user_list as $index => $item) {
                                    echo "<tr>";
                                    $vrdpport = 3000 + intval($vuser->vid) * 10 + $index;
                                    echo "<td>".$index."</td>";
                                    echo "<td>".$item['name']."</td>";
                                    echo "<td>" . $site_host . ':' . $vrdpport . '</td>';
                                    nat_configure($item['name'],$site_ip,($vuser->vid+10 + $increment),$vbox_m_predict);
                                    echo "<td>ssh -p 22" . ($vuser->vid+10 + $increment) .' ' . $sshuser . '@' . $site_ip . "</td>";
                                    create_vrdp($item['name'], $vrdpport, 123, $vbox_m_predict);
                                    start_vm($item['name'], 'vrdp', $vbox_m_predict);
                                    echo "<td>Включена</td>";
                                    echo "</tr>";
				    $increment++;
                                }
                                ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right" id="off-btn">Выключить</button>
                        </br>
                        </br>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //Close page script
    $('#off-btn').click(function () {
        $.ajax({
            dataType: "json",
            url: '' + '<?=$site_host?>' + '/<?=$htdocs_host?>' + '/closevm',
        });
        window.location.href = "/virtual/virt_lesson?lesson_id=" + '<?=$current_lesson?>';
    });
</script>
