<?php
include("Connexion/database.php");

// Utilisation de la fonction (exemple)
$dossierDestination = "documents";
$inputNom = "document";

$resultat = enregistrerFichier($dossierDestination, $inputNom);

if(!empty($_POST)){
  if ($resultat) {
    $_POST['document']=$resultat;
  } 
  echo  insertMessageData($_POST);
}
?>  