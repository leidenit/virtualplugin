<?php
require_once "libs/db/db_functions.php";
IMPORT_TABLES($db_host,$db_user,$db_pass,$db_database, $_FILES["file"]["tmp_name"]);

echo "good upload";
?>