<?php
include '../initArticle.php';
$select= $articles->getblog($get['id']);
?>

<div class="delete">
    <div> czy jestes pewien że chcesz usunąć post </div>
    <div class="title-post"><?php  echo $select['title']; ?></div>
    <div> utworzony: <span class="time-post"><?php  echo $select['date_add']; ?></span> </div>
        
    <div class="delbutton">
        <button data-reset>Rezygnuje</button>
        <button data-delakcept>Usuń</button>
    </div>
</div>