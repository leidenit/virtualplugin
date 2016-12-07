<?php
//Vm functions
function get_db_vm($item_id,$pdo)
{
	$stmt = $pdo->query("SELECT * FROM virtualprofile WHERE id = '$item_id'");
    $result = $stmt->fetchAll();
    return $result[0];
}

function create_db_vm($name, $os,$property,$description,$pdo)
{	
	$stmt = $pdo->query("INSERT INTO virtualprofile (name,os,property,description) VALUES('$name','$os','$property','$description')");
	$stmt = $pdo->query("SELECT LAST_INSERT_ID()");
	$lastId = $stmt->fetch(PDO::FETCH_NUM);
	$lastId = $lastId[0];
	return $lastId;
}

function update_db_vm($name, $os,$property,$description,$item_id,$pdo)
{
	$stmt = $pdo->query("UPDATE virtualprofile SET name='$name', os='$os', property = '$property', description = '$description' WHERE id = '$item_id'");
}

function get_vm_db_list($cfrom,$cto,$pdo)
{
    $stmt = $pdo->query("SELECT * FROM virtualprofile LIMIT $cfrom,$cto");
    return $stmt->fetchAll();
}

function delete_db_vm($item_id,$pdo)
{
	$stmt = $pdo->query("DELETE FROM lab_vm_id WHERE vm_id = '$item_id'");
    $stmt = $pdo->query("DELETE FROM virtualprofile WHERE id = '$item_id'");
}
?>