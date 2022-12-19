<?php 
include '../initArticle.php';
$select = $articles->getblogs();

$header=[
    'title'=>'Blog',
    'subtitle'=>'Panel zarządzania'
];
include DIR_VIEW.'admin-header.php';
?>

<section class="bl-admin-nav"> <button data-add>Dodaj nowy post</button> </section>
<section class="tableContractor">

<?php 

$i=0;
foreach( $select as $row) {
    $i++;
    $colorRow='colorRow';
    ?>

    <div class="col-info colorRow">
        <?php
            $rand=uniqid(rand(), true);
            $fileImg=$fileUrl.$row['id'].'.jpg';
            $coverViews=$coverView.$row['id'].'.jpg';
            if(file_exists($fileImg))  { 
                echo '<div class="icon-cover">';
                echo '<img src="'.$coverViews.'?ver='.$rand.'" alt="img">'; 
                echo '</div>';
            }
            ?> 
        <div class="lang-name">
            Język: <?php  foreach ($config->lang as $lang) { if ($row['lang'] == $lang->id) { echo $lang->name; } } ?>
        </div> 
        <div>ID: <?php echo $row['id']; ?></div>
        <div>Kat: <b><?php echo $row['name']; ?></b></div>
        <?php if (count($row['tags'])) {?>
            <div class="tabs-list">
                <div class="headinfo">Tagi:</div>
                <?php foreach($row['tags'] as $tag) {
                    echo '<div class="item">'.$tag.'</div>';
                } ?>
            </div>
        <?php } ?>
    </div>

    <div class="content <?php echo $colorRow; ?> ">
        <div>Tytuł:</div>
        <div class="post-title"><?php echo $row['title']; ?></div> 
        <div>Wprowadzenie:</div>
        <div class="panel-text"><?php echo $row['shortcontent']; ?></div>
         
        <div class="panel-text content-more">
            <div class="header-content">
                <div>Treść:</div>
                <div class="more"><span class="view-more">Pokaż więcej</span><span>Pokaż mniej</span></div>
            </div>
            <div class="contentmore"><?php echo $row['content']; ?></div>
        </div>
    </div>

    <div class="blog-action <?php echo $colorRow; ?>">
        <?php
        if ($row['published']) {
            echo '<div data-public=1 data-idblog='.$row['id'].' class="public">Opublikowany</div>';
        } else {
            echo '<div data-public=0 data-idblog='.$row['id'].' class="draw">Szkic</div>';
        }
        ?>
        <div class="data-info">
            <div>Utworzono:</div>
            <div><?php echo $row['date_add']; ?></div>
            <div> Ostatnia modyfikacja: </div>
            <div><?php echo $row['date_up']; ?></div>
        </div>
        <div class="action">
            <button data-edit="<?php echo $row['id']; ?>">Edytuj</button>
            <button data-delete="<?php echo $row['id']; ?>">Usuń</button>
        </div>
    </div>
    <?php
}
?>
</section>
