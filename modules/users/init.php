<?php
//User module initialization
include_once "libs/db/dbconnection.php";
include_once "modules/users/lib/classes.php"; 

//Create user object
$vuser = new UserClass($USER->firstname,$USER->lastname,$USER->id,$pdo);
?>