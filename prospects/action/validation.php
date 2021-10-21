<?php
    require('../database.php');
    $id_prospect = $_POST['id'];

    // Update row with the new load number
    $loadNumber = $_POST['loadNumber'];
    $pdo = getConnexion();
    $rq = "UPDATE prospect SET loadNumber=?, isActive=0 WHERE id=?";
    $stmt= $pdo->prepare($rq);
    $stmt->execute([$loadNumber, $id_prospect]);

    // Select infos on the prospect to insert them as a user
    $pdo = getConnexion();
    $stmt = $pdo->prepare("SELECT * FROM PROSPECT WHERE id = ?");
    $stmt->execute([$id_prospect]); 
    $data = $stmt->fetch();

    $actor = $_POST['actor'];
    $nameP = $data['nameP'];
    $country = $data['country'];
    $phone = $data['phone'];
    $email = $data['email'];
    $typeP = $data['typeP'];

    // Insert the new client / carrier into the Users database
    $pdo = getConnexion();
    $rq = "INSERT INTO USERS (manager_id, company, origin, phone, email, typeU, created_at, updated_at) VALUES (?,?,?,?,?,?,now(),now())";
    $stmt = $pdo->prepare($rq);
    $stmt->execute([$actor, $nameP, $country, $phone, $email, $typeP]);
    //print_r($stmt->errorInfo());

    exit();
?>
