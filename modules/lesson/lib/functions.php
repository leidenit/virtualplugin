<?php
//Lesson functions
function get_lesson($item_id, $pdo)
{
    $stmt = $pdo->query("SELECT * FROM lab WHERE id = '$item_id'");
    $result = $stmt->fetchAll();
    return $result[0];
}

function create_lesson($name, $description, $vmarray,$urlimg,$pdo)
{
    $stmt = $pdo->query("INSERT INTO lab (name,description,image) VALUES('$name','$description','$urlimg')");
    $stmt = $pdo->query("SELECT LAST_INSERT_ID()");
    $lastId = $stmt->fetch(PDO::FETCH_NUM);
    $lastId = $lastId[0];
    foreach ($vmarray as $i) {
        $stmt = $pdo->query("INSERT INTO lab_vm_id (lab_id,vm_id) VALUES('$lastId','$i')");
    }
    return $lastId;
}

function update_lesson($name, $description, $vmarray, $item_id, $pdo)
{
    $stmt = $pdo->query("UPDATE lab SET name='$name', description='$description' WHERE id = '$item_id'");
    $stmt = $pdo->query("DELETE FROM lab_vm_id WHERE lab_id='$item_id'");
    foreach ($vmarray as $i) {
        $stmt = $pdo->query("INSERT INTO lab_vm_id (lab_id,vm_id) VALUES('$item_id','$i')");
    }
}

function get_lesson_list($cfrom, $cto, $pdo)
{
    $stmt = $pdo->query("SELECT * FROM lab LIMIT $cfrom,$cto");
    return $stmt->fetchAll();
}

function delete_lesson($item_id, $pdo)
{
    $stmt = $pdo->query("DELETE FROM lab WHERE id = '$item_id'");
}

function get_lesson_selected_vm($item_id, $pdo)
{
    $stmt = $pdo->query("SELECT * FROM lab_vm_id WHERE lab_id = '$item_id'");
    $res = [];
    foreach ($stmt as $item) {
        $res[] = $item['vm_id'];
    }
    return $res;
}

function get_name_selected_lesson_vm($vmarray, $pdo)
{
    $res = [];
    foreach ($vmarray as $item) {
        $stmt = $pdo->query("SELECT * FROM virtualprofile WHERE id = '$item'");
        $result = $stmt->fetchAll();
        $res[] = $result[0];
    }
    return $res;
}

function get_name_lesson_vm($lesson_id, $pdo)
{
    $res = [];
    $stmt = $pdo->query("SELECT * FROM lab_vm_id WHERE lab_id = '$lesson_id'");
    $result = $stmt->fetchAll();
    foreach ($result as $item) {
        $id_vm = $item['vm_id'];
        $stmt = $pdo->query("SELECT * FROM virtualprofile WHERE id = '$id_vm'");
        $result = $stmt->fetchAll();
        $item_vm = $result[0];
        $res[] = $item_vm['name'];
    }
    return $res;
}
?>