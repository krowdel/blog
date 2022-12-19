<?php
include '../initArticle.php';
$update= $articles->update();
// echo '<pre>';
// var_dump($get);
// var_dump($_FILES);
// echo '</pre>';

if ($update) {
    echo 'Blog został zaktualizowany';
} else { echo 'Nie udała się aktualizacja'; }