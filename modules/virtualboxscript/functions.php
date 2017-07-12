<!-- Virtualbox functions -->
<?php

function get_vm_list($vbox_m_predict)
{
    $list_string = shell_exec($vbox_m_predict . ' list vms');
    $str_split_res = str_split($list_string);

    $name_a = -1;
    $c_name = [];
    $c_count = -1;
    foreach ($str_split_res as $item) {
        if ($item == '"') {
            if ($name_a = -1) {
                $c_count++;
                $c_name[$c_count] = '';
            }
            $name_a = -$name_a;
        } else if ($name_a == 1) {
            $c_name[$c_count] .= $item;
        }
    }

    $res = [];
    $res_c = 0;
    for ($i = 0; $i <= count($c_name) - 1; $i++) {
        $res[$res_c] = array("name" => $c_name[$i], "id" => trim(str_replace(array(' ', '{', '}'), '', $c_name[$i + 1])));
        $i++;
        $res_c++;
    }
    return $res;
};

function create_vm($vm_name, $have_disk, $disksize, $ostype, $iso_path, $memory, $vbox_m_predict)
{
    $debug_list = '';
    if ($ostype != '') {
        $os_predict = ' --ostype "' . $ostype . '"';
    } else {
        $os_predict = '';
    }
    $debug_list = $debug_list . shell_exec($vbox_m_predict . ' createvm --name ' . $vm_name . $os_predict . ' --register') . '</br>';

    if ($have_disk) {
        $debug_list = $debug_list . shell_exec($vbox_m_predict . ' createhd --filename ' . $vm_name . '.vdi --size ' . $disksize) . '</br>';
        $debug_list = $debug_list . shell_exec($vbox_m_predict . ' storagectl ' . $vm_name . ' --name "SATA Controller" --add sata \ --controller IntelAHCI') . '</br>';
        $debug_list = $debug_list . shell_exec($vbox_m_predict . ' storageattach ' . $vm_name . ' --storagectl "SATA Controller" --port 0 \ --device 0 --type hdd --medium ' . $vm_name . '.vdi') . '</br>';
    }
    if ($iso_path = !'') {
        $debug_list = $debug_list . shell_exec($vbox_m_predict . ' storagectl ' . $vm_name . ' --name "IDE Controller" --add ide') . '</br>';
        $debug_list = $debug_list . shell_exec($vbox_m_predict . ' storageattach ' . $vm_name . ' --storagectl "IDE Controller" --port 0 \ --device 0 --type dvddrive --medium ' . $iso_path) . '</br>';
    }

    $debug_list = $debug_list . shell_exec($vbox_m_predict . ' modifyvm ' . $vm_name . ' --ioapic on') . '</br>';
    $debug_list = $debug_list . shell_exec($vbox_m_predict . ' modifyvm ' . $vm_name . ' --boot1 dvd --boot2 disk --boot3 none --boot4 none') . '</br>';

    if ($memory != '') {
        $debug_list = $debug_list . shell_exec($vbox_m_predict . ' modifyvm ' . $vm_name . ' --memory ' . $memory . ' --vram 128') . '</br>';
    }
    return $debug_list;
};

function get_vm_info($name, $vbox_m_predict)
{
    return shell_exec($vbox_m_predict . ' showvminfo "' . $name . '"');
};

function clone_vm($name, $new_name, $vbox_m_predict)
{
    return shell_exec($vbox_m_predict . ' clonevm ' . $name . ' --name ' . $new_name . ' --register --mode all');
}

function start_vm($name, $type, $vbox_m_predict)
{
    return shell_exec($vbox_m_predict . ' startvm ' . $name . ' --type ' . $type);
}

function is_vm($name, $vbox_m_predict)
{
    foreach (get_vm_list($vbox_m_predict) as $item) {
        if ($item['name'] == $name) {
            return true;
        }
    }
    return false;
}

function create_vrdp($name, $port, $password, $vbox_m_predict)
{
    return shell_exec($vbox_m_predict . ' modifyvm ' . $name . ' --vrdeproperty VNCPassword=' . $password . ' --vrdeauthlibrary null --vrdeport ' . $port);
}

function poff_vm($name, $vbox_m_predict)
{
    return shell_exec($vbox_m_predict . ' controlvm ' . $name . ' poweroff');
}

function nat_configure($name,$site_ip, $ipnum,$vbox_m_predict)
{
    return shell_exec($vbox_m_predict . ' modifyvm ' . $name . ' --natpf1 "guestssh,tcp,' .$site_ip.',22' . $ipnum .',,22"');
}

?>
