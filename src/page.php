<?php
include("Connexion/database.php");
$page=!empty($_GET['page'])?$_GET['page']:1;
$html='';
$list=getEngineersByPage($page);
if(!empty($list)){ 
  foreach($list as $item){ 
    $html.='<div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member" style="width:100%;">
                    <div class="member-img" >
                    <span class="bi bi-person-check" style="font-size: 50px;color:#1e4152;"></span>
                    </div>
                    <div class="member-info" style="padding-top: 1px !important;">
                    <h4 style="font-size:15px;">'.$item['nom'].' '.$item['prenom'].'</h4>
                    <span style="color:black !important;font-weight:bold;">'.$item['diplome'].'</span>
                    <span style="color:#1e4152;">'.promo($item['promotion'],$item['etablissement']).'</span>
                    </div>
                </div>
            </div>';
   } 
}
echo $html;
?>