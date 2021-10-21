<?php
  require('../database.php');  
  $id = $_POST['id'];
  
  // First the update parameters :
  $actor = NULL;
  $available = 1;
  $deadline = NULL;
  
  $pdo = getConnexion();
  $rq = "UPDATE PROSPECT SET actor=?, available=?, deadline=? WHERE id=?";
  $stmt= $pdo->prepare($rq);
  $stmt->execute([$actor, $available, $deadline, $id]);
  //print_r($stmt->errorInfo());

  // Then the insert parameters :
  $actor = $_POST['actor'];
  $creation = date("Y-m-d", time());
  $comment = str_replace("'", "''", $_POST['comment']);

  $pdo = getConnexion();
  $rq = "INSERT INTO TRACKING (id_prospect, creation, commentT, actor) VALUES (?,?,?,?)";
  $stmt= $pdo->prepare($rq);
  $stmt->execute([$id, $creation, $comment, $actor]);
  //print_r($stmt->errorInfo());

  exit();
?>
