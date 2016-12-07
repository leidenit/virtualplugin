<!-- Get lesson description action -->
<?php
	parse_str($_SERVER['QUERY_STRING']);
	$stmt = $pdo->query("SELECT * FROM lab WHERE id = '$item_id'");
    $result = $stmt->fetchAll();
    $r_item = $result[0];
    echo $r_item['description'];
?>