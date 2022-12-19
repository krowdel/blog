<?php
include '../initCategory.php';
$select= $categories->getCategory($get['id']);
?>

<div class="delete">
    <div> czy jestes pewien że chcesz usunąć tą kategorie: </div>
    <div class="title-post"><?php  echo $select['name']; ?></div>
        
    <div class="delbutton">
        <button data-reset>Rezygnuje</button>
        <button data-delakcept>Usuń</button>
    </div>
</div>