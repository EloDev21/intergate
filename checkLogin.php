<?php
//session_start();
require('prospects/database.php');

$email = htmlentities($_POST['email']);
$password = htmlentities($_POST['password']);

if ($email != "" && $password != ""){

    $pdo = getConnexion();
    $stmt = $pdo->prepare("SELECT COUNT(*) AS countUsr FROM MANAGERS WHERE `email` = ? AND `pass` = ?");
    $stmt->execute([$email, $password]); 
    $data = $stmt->fetch();
    $count = $data['countUsr'];

    if($count > 0){
        $stmt = $pdo->prepare("SELECT id, first_name FROM MANAGERS WHERE `email` = ? AND `pass` = ?");
        $stmt->execute([$email, $password]);
        $data = $stmt->fetch();
        $_SESSION['firstname'] = $data['first_name'];
        $_SESSION['id_manager'] = $data['id'];
        $array = array('return' => 1);
        echo json_encode($array);
    } else {
        $array = array('return' => 0);
        echo json_encode($array);
    }

} else {
    $array = array('return' => 0);
    echo json_encode($array);
}

