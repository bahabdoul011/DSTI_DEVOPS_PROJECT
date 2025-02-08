<?php
include("database.php");
createEngineerTable();
createMessageTable();
createUsersTable();
registerDefaultUser();

include("../List/list.php");
$list=ListEng::LIST;

if(!empty($list)){
    foreach($list as $item){
        insertEngineerData($item);
    }
}
?>