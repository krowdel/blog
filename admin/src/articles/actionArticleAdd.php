<?php 
include '../initArticle.php';
$insert= $articles->insert();

if ($insert) {
    echo 'Post został dodany';
} else { echo 'Nie udało się dodać postu'; }



