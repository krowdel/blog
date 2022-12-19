<?php include '../initTags.php'; ?>

<div class="delete">
    <div> Czy jesteś pewień że chcesz, usunąć tag </div>
    <div class="title-post"><?php  echo $get['nameTag']; ?></div>
    <div> ze wszsytkich artykułów.</div>
        
    <div class="delbutton">
        <button data-reset>Rezygnuje</button>
        <button data-delakcept>Usuń</button>
    </div>
</div>