<?php 
session_start();
$_SESSION["ctri"]=array();
unset($_SESSION["ctri"]);
header("location:../login/");

?>