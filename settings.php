<?php
//Add moodle config
require "../config.php";
require_login();

//First constructions of terminal sentence
$vbox_m_predict = "VBoxManage";
$vbox_h_predict = "VBoxHeadless";

//Main site informations
$site_host = "http://172.18.146.140";
$site_ip = "172.18.146.140";
$sshuser = "user";
$site_tittle = "Virtual Srudents";
$site_name = "Students VM";
$htdocs_host = "virtual";
$main_host = "/virtualplugin/";

//Check host path
$host_path = array_filter(explode("/", $main_host), function($value) { return $value !== ''; });
$host_path_length = count($host_path);
?>
