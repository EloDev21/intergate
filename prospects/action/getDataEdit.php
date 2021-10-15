<?php 
    require_once('../database.php');

    $id = $_POST['idProspect'];

    $pdo = getConnexion();
    $stmt = $pdo->prepare("SELECT * FROM PROSPECT WHERE id = ?");
    $stmt->execute([$id]); 
    $data = $stmt->fetch();

    $array = array('typeP' => $data['typeP'], 'nameP' => $data['nameP'], 'email' => $data['email'], 'phone' => $data['phone'], 'country' => $data['country'], 'actor' => $data['actor'], 'available' => $data['available'], 'creation' => $data['creation'], 'deadline' => $data['deadline']);
    echo json_encode($array);
?>