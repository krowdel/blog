<?php 
include '../initCategory.php';
if ($get['statut']==0) {
    $get['statut']=1;
} else {
    $get['statut']=0;
}
var_dump($get['id']);
$categories->activation($get['id'], $get['statut']); 
