<?php 
include '../initCategory.php';
$insert= $categories->insert();

if ($insert) {
    echo 'Kategoria zosta dodana';
} else { echo 'Nie udało się dodać kategorii'; }



