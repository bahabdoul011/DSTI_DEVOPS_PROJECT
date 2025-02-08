<?php
include("Connexion/database.php");

if(!empty($_POST)){
  echo  insertEngineerData($_POST);
}
?>  