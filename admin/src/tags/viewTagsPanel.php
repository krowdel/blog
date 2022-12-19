<?php 
include '../initTags.php';
$select = $tags->getTagsName();

$header=[
    'title'=>'Tagi',
    'subtitle'=>'Panel zarządzania.'
];
include DIR_VIEW.'admin-header.php';
?>

<section class="bl-admin-nav"> 
    <!-- <button data-add>Dodaj nową kategorie</button>  -->
</section>
<section class="tableContractor tags-panel">

<?php 
foreach( $select as $row) {
    ?>
    <div class="content tags-element">
        <div class="tag-item">
            <?php echo '<div class="tag-name">'.$row['name_tag'].'</div>'; ?>
        </div> 
        <div class="blog-action">
            <?php echo '<div class="tag-info">użyty: '.$row['qua_article'].'</div>'; ?>
            <div class="action">
                <?php echo '<button data-delete="'.$row['name_tag'].'">Usuń</button>'; ?>
            </div>
        </div>
    </div>
    <?php
}
?>
</section>
