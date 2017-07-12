<!-- Power off vm action -->
<?php
    include_once 'settings.php';
    include_once 'modules/virtualboxscript/functions.php';
    foreach($vuser->get_all_vm() as $item){
        poff_vm($item['name'], $vbox_m_predict);
    }
?>