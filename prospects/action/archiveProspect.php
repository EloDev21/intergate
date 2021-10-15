<?php
  require('../database.php');  
  $id = $_POST['id'];

  // First the update parameters :
  $actor = NULL;
  $available = 1;
  $deadline = NULL;
  
  $pdo = getConnexion();
  $rq = "UPDATE prospect SET actor=?, available=?, deadline=? WHERE id=?";
  $stmt= $pdo->prepare($rq);
  $stmt->execute([$actor, $available, $deadline, $id]);
  //print_r($stmt->errorInfo());

  // Then the insert parameters :
  $creation = date("Y-m-d", time());
  $comment = str_replace("'", "''", $_POST['comment']);
  // $actor = $_POST['actor'];
  $actor = "Greg";

  $pdo = getConnexion();
  $rq = "INSERT INTO prospect_tracking (id_prospect, creation, comment, actor) VALUES (?,?,?,?)";
  $stmt= $pdo->prepare($rq);
  $stmt->execute([$id, $creation, $comment, $actor]);
  //print_r($stmt->errorInfo());

  exit();
?>
