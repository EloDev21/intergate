<?php

require_once('../database.php');

$pdo = getConnexion();
$stmt = $pdo->prepare("SELECT id, first_name, last_name FROM MANAGERS");
$stmt->execute(); 
$data = $stmt->fetchAll();

$ret = "<option value='No' selected>No</option>";
foreach($data as $managers) {
    $ret .= "<option value='".$managers['id']."'>".$managers['first_name']." ".$managers['last_name']."</option>";
}

$array = array('selectRet' => $ret);
echo json_encode($array);
