<?php
  require('../database.php');
  
  $id = $_POST['id'];
  
  $pdo = getConnexion();
  $rq = "DELETE FROM prospect WHERE id=?";
  $stmt= $pdo->prepare($rq);
  $stmt->execute([$id]);
  //print_r($stmt->errorInfo());

  exit();
?>
