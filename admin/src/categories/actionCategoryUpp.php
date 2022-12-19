<?php
include '../initCategory.php';
$update= $categories->update();


if ($update) {
    echo 'Kategoria został zmodyfikowana';
} else { echo 'Nie udała się aktualizacja'; }