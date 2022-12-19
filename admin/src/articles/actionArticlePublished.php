<?php 
include '../initArticle.php';
// $articles = new Articles;
if ($get['statut']==0) {
    $get['statut']=1;
} else {
    $get['statut']=0;
}
$articles->published($get['id'], $get['statut']); 
