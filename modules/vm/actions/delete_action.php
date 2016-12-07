<!-- Delete lesson action -->
<?php
include_once "modules/vm/lib/functions.php";

parse_str($_SERVER['QUERY_STRING']);
delete_db_vm($item_id,$pdo);
?>