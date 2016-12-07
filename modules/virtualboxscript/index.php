<!-- Page: start-virtual-lesson -->
<?php
include_once 'functions.php';
include_once 'modules/lesson/lib/functions.php';

//parse lesson id
parse_str($_SERVER['QUERY_STRING']);
$current_lesson = $item_id;
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Практикум <?= $current_lesson ?></h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                $vm_list = $vuser->check_vm($current_lesson);
                                foreach (get_name_lesson_vm($current_lesson, $pdo) as $item) {

                                    $vm_name = $item . $vuser->vid . $current_lesson;
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
                                            echo "Виртуальная машина-родитель <b>" . $item . "</b> отсутствует в системе!</br>";
                                        }
                                        clone_vm($item, $vm_name, $vbox_m_predict);
                                    }
                                }
                                $vm_user_list = $vuser->get_vm_lesson_list($current_lesson);
                                foreach ($vm_user_list as $index => $item) {
                                    $vrdpport = 3000 + intval($vuser->vid) * 10 + $index;
                                    echo "<h4><b>Виртуальная машина $index</b></h4>";
                                    echo "<p>Подключение по RDP:" . $site_host . ':' . $vrdpport . '</p>';
                                    nat_configure($item['name'],$site_ip,($vuser->vid+10),$vbox_m_predict);
                                    echo "Ssh:ssh -p 22" . ($vuser->vid+10) .' ' . $sshuser . '@' . $site_ip;
                                    create_vrdp($item['name'], $vrdpport, 123, $vbox_m_predict);
                                    start_vm($item['name'], 'vrdp', $vbox_m_predict);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //Close page script
    window.onbeforeunload = function () {
        $.ajax({
            dataType: "json",
            url: 'http://' + '<?=$site_host?>' + '/<?=$htdocs_host?>' + '/closevm',
        });
        if (confirm("Are you sure to leave without saving data?")) {
            self.close();
        }
    }
</script>