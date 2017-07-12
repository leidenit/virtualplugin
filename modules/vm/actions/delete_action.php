<!-- Delete lesson action -->
<?php
include_once "modules/vm/lib/functions.php";

echo "asdasd";
parse_str($_SERVER['QUERY_STRING']);
delete_db_vm_by_name($item_name,$pdo);
?>