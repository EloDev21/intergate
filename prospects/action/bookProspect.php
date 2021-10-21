<?php
  require('../database.php');
  
  $id = $_POST['id'];
  $actor = $_POST['actor'];
  $available = 0;
  $deadline = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+14, date("Y")));

  $pdo = getConnexion();
  $rq = "UPDATE prospect SET actor=?, available=?, deadline=? WHERE id=?";
  $stmt= $pdo->prepare($rq);
  $stmt->execute([$actor, $available, $deadline, $id]);
  //print_r($stmt->errorInfo());

  exit();
?>
