<!-- Delete lesson action -->
<?php
include_once "modules/lesson/lib/functions.php";

parse_str($_SERVER['QUERY_STRING']);
delete_lesson($item_id,$pdo);
?>