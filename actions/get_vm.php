<!-- Get vm action -->
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div>
                <?php
                include_once 'settings.php';
                include_once 'modules/virtualboxscript/functions.php';
                parse_str($_SERVER['QUERY_STRING']);
                $vm_list = $vuser->check_vm($lab_id);
                if (count($vm_list) == 0) {
                    echo 'У вас нет виртуальных машин для этого практикума, они будут созданы!';
                } else {
                    echo '<table class="table table-hover"><thead><tr><th>№</th>
                                        <th>Название</th>
                                        <th>Статус</th>
                                    </tr>
                                </thead><tbody>';
                    foreach ($vm_list as $index=>$item) {
                        echo '<tr>';
                        echo '<td>' . ++$index . '</td>';
                        echo '<td>' . $item['name'] . '</td>';
                        if (is_vm($item['name'], $vbox_m_predict)) {
                            echo '<td>Есть в системе</td>';
                        } else {
                            echo '<td>Будет пересоздана</td>';
                        }
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<a type="submit" class="btn btn-info btn-fill pull-right" href="startvm?item_id=<?= $lab_id ?>">Приступить</a>
<div class="clearfix"></div>
