<!-- Add vm action -->
<?php
include_once "modules/vm/lib/functions.php";

parse_str($_SERVER['QUERY_STRING']);
$item_id = create_db_vm($item_name, '', '', '', $pdo);
?>

