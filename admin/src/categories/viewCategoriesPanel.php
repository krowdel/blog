<?php 
include '../initCategory.php';
$select = $categories->getAllCategories();

$header=[
    'title'=>'Kategorie',
    'subtitle'=>'Panel zarządzania'
];
include DIR_VIEW.'admin-header.php';
?>

<section class="bl-admin-nav"> <button data-add>Dodaj nową kategorie</button> </section>
<section class="tableContractor category-table">

<?php 

$i=0;
foreach( $select as $row) {
    $i++;
    $colorRow='colorRow';
    ?>

    <div class="col-info colorRow">
        <div class="lang-name">
            <?php  foreach ($config->lang as $lang) { if ($row['lang'] == $lang->id) { echo $lang->name; } } ?>
        </div> 
        ID. <?php echo $row['id_category']; ?>
    </div>
    <div class="content <?php echo $colorRow; ?> ">
        <div class="post-title">
            <div>
            <div class="subtitle">Kategoria:</div>
            <?php 
            echo $row['name'].'</div>'; 
            if (isset($row['quantity_article'])) {
                echo '<span>';
                echo $row['quantity_article'];
                if ($row['quantity_article']>1) {
                    echo ' artykuły.';
                } else {
                    echo ' artykuł.';
                }
                echo '</span>';
            }
            ?>
        </div> 
    </div>
    <div class="blog-action <?php echo $colorRow; ?>">
        <div class="action">
            <?php
            if ($row['active']) {
                echo '<div data-public=1 data-idblog='.$row['id_category'].' class="public">Aktywna</div>';
            } else {
                echo '<div data-public=0 data-idblog='.$row['id_category'].' class="draw">Nie dostępna</div>';
            }
            ?>
            <button data-edit="<?php echo $row['id_category']; ?>">Edytuj</button>
            <?php
            if (isset($row['quantity_article'])) { 
                echo '<button data-nodelete>Usuń</button>';
            } else {
                echo '<button data-delete="'.$row['id_category'].'">Usuń</button>';
            }
            ?>
        </div>
    </div>
    <?php
}
?>
</section>
