<?php
  require('../database.php');
  
  $id_prospect = $_POST['id'];
  $actor = $_POST['actor'];
  $cityFrom = str_replace("'", "''", $_POST['cityFrom']);
  $cityTo = str_replace("'", "''", $_POST['cityTo']);
  $offer  = $_POST['offer'];
  $commentO = str_replace("'", "''", $_POST['commentO']);
  $creation = date("Y-m-d", time());
  
  $pdo = getConnexion();
  $rq = "INSERT INTO OFFER (id_prospect, creation, actor, cityFrom, cityTo, offer, commentO) VALUES (?,?,?,?,?,?,?)";
  $stmt = $pdo->prepare($rq);
  $stmt->execute([$id_prospect, $creation, $actor, $cityFrom, $cityTo, $offer, $commentO]);
  print_r($stmt->errorInfo());

  exit();
?>
