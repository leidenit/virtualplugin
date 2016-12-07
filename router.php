<?php
include_once "settings.php";
include_once "libs/interface_lib/interface_lib.php";

//Parse url
$server_url = parse_url($_SERVER['REQUEST_URI']);
$url_f = $server_url["path"];
$tokens = array_filter(explode("/", $url_f), function ($value) {
    return $value !== '';
});

//Set default status for menu
$menu_active = 1;

//Check user for admin status
$admins = get_admins();
$isadmin = false;
foreach ($admins as $admin) {
    if ($USER->id == $admin->id) {
        $isadmin = true;
        break;
    }
}

include_once "modules/users/init.php";

//Navigation construction
if (sizeof($tokens) == 1) {
    include_once "base/header.php";
    include "index.php";
} else {
    if ($tokens[2] == 'startvm') {
        include_once "base/header.php";
        include "modules/virtualboxscript/index.php";
    } else if ($tokens[2] == 'closevm') {
        include "actions/close_vm.php";
    } else if ($tokens[2] == 'descr') {
        include "actions/get_des.php";
    } else if ($tokens[2] == 'getvm') {
        include "actions/get_vm.php";
    } else if ($tokens[2] == 'user') {
        $menu_active = 2;
        include_once "base/header.php";
        include "modules/users/index.php";
    } else if ($tokens[2] == 'administration') {
        if ($isadmin) {
            $menu_active = 3;
            include_once "base/header.php";
            if (sizeof($tokens) == 2) {
                include "modules/lesson/index.php";
            } else if ($tokens[3] == 'delete') {
                include "modules/lesson/actions/delete_action.php";
            } else if ($tokens[3] == 'create') {
                include "modules/lesson/actions/add_action.php";
            } else if ($tokens[3] == 'change') {
                if (sizeof($tokens) == 3) {
                    include "modules/lesson/change.php";
                } else if ($tokens[4] == 'update') {
                    include "modules/lesson/actions/update_action.php";
                } else {
                    $menu_active = 7;
                    include "static/error.php";
                }
            } else {
                $menu_active = 7;
                include "static/error.php";
            }
        } else {
            $menu_active = 7;
            include "static/error.php";
        }
    } else if ($tokens[2] == 'virtualmachines') {
        if ($isadmin) {
            $menu_active = 4;
            include_once "base/header.php";
            if (sizeof($tokens) == 2) {
                include "modules/vm/index.php";
            } else if ($tokens[3] == 'delete') {
                include "modules/vm/actions/delete_action.php";
            } else if ($tokens[3] == 'create') {
                include "modules/vm/actions/add_action.php";
            } else if ($tokens[3] == 'change') {
                if (sizeof($tokens) == 3) {
                    include "modules/vm/change.php";
                } else if ($tokens[4] == 'update') {
                    include "modules/vm/actions/update_action.php";
                } else {
                    $menu_active = 7;
                    include "static/error.php";
                }
            } else {
                $menu_active = 7;
                include "static/error.php";
            }
        } else {
            $menu_active = 7;
            include "static/error.php";
        }
    } else if ($tokens[2] == 'about') {
        $menu_active = 6;
        include_once "base/header.php";
        include "static/about.php";
    } else if ($tokens[2] == 'settings') {
        $menu_active = 5;
        include_once "base/header.php";
        include "set.php";
    } else if ($tokens[2] == 'vbox') {
        $menu_active = 8;
        include_once "base/header.php";
        include_once "modules/virtualboxscript/test.php";
    } else {
        $menu_active = 7;
        include_once "base/header.php";
        include "static/error.php";
    }
}

include_once "base/footer.php";
?>