<?php
  function getConnexion() {
    $dbhost = 'localhost';
    $dbname = 'prospect';
    $dbuser = 'root';
    $dbpass = '';
    
    try {
  	  $bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname.';charset=utf8', $dbuser, $dbpass);
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }

    //echo 'Connected successfully';
    return $bdd;
  }
?>
