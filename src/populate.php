<?php
include("Connexion/database.php");
include("List/list.php");
$list=ListEng::LIST3;

if(!empty($list)){
    foreach($list as $item){
        insertEngineerData($item);
    }
}
?>