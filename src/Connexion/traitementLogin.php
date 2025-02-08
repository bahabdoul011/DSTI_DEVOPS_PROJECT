<?php
include("database.php");
session_start();
$email      = !empty($_POST['email'])?$_POST['email']:"";
$password   = !empty($_POST['password'])?$_POST['password']:"";

$user = authenticateUser($email, $password);

if ($user) {
  // L'utilisateur est authentifié
  $_SESSION['ctri']['id']=$user['id'];
  header("location:../Admin/");
} else {
  // L'utilisateur n'est pas authentifié
  header("location:../login/?error=1");
}
?>