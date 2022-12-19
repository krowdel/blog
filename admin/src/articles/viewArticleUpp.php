<?php
include '../initArticle.php';
$dane=$articles->getblog($get['id']);
$categoriesActiv=$categories->getAllCategories();

$header=[
    'title'=>'Edycja posta: ',
    'subtitle'=>$dane['title']
];
include DIR_VIEW.'admin-header.php';

$itemtags='';
foreach($dane['tags'] as $row) { $itemtags.=$row.', '; }
if ($tags!='') { $itemtags=substr($itemtags, 0, -2); }
?>

<section class="bl-admin-nav">
    <button data-home>Powrót</button>
    <div class="group-button">
        <button data-reset>Anuluj</button>
        <button data-akcept>Zapisz</button>
    </div>
</section>

<form method="post" class="articles-form">
    <input type="hidden" name="id" value="<?php echo $dane['id'];?>" >
    <div class= "form-edit-add">
        <?php 
        $rand=uniqid(rand(), true);
        $fileUrl.=$dane['id'].'.jpg';
        $coverView.=$dane['id'].'.jpg';
        ?>
        <div class="anchor-img">
            <?php
                if(file_exists($fileUrl))  {
                    echo '<div data-reimage='.$dane['id'].' class="activ"><span></span><span></span></div>';
                } else {
                    echo '<div data-reimage='.$dane['id'].' ><span></span><span></span></div>';
                }
            ?> 
            <div class="img-upload"> 
                <?php
                    if(file_exists($fileUrl))  {
                        echo '<img src="'.$coverView.'?ver='.$rand.'" alt="img">';
                    }
                ?> 
            </div>
        </div>
        <div class="article-seting-top">
            <div class="file-upload">
                <input type="file" id="cover" name="cover" accept="image/png, image/jpeg">
            </div>
            <div class="input-category input-select">
                Kategoria:
                <select name="idCategory">
                    <?php 
                    foreach($categoriesActiv as $row) {
                        echo '<option value="'.$row['id_category'].'"';
                        if ($row['id_category']==$dane['id_category']) {echo 'selected';}
                        echo '>'.$row['name'].'</option>';
                    } 
                    ?>
                </select>
            </div>
            <?php include DIR_VIEW.'option-lang.php'; ?>
            <div id="switchRadio">
                <input type="radio" name="published" value=0 id="vat_payer_no" <?php echo (!$dane['published']? 'checked':'');?> />
                <label for="vat_payer_no"> Publikacja </label>

                <input type="radio" name="published" value=1 id="vat_payer_yes"  <?php echo ($dane['published']? 'checked':'');?> />
                <label for="vat_payer_yes"> Szkic </label>
            </div>
        </div>
        
        <label for="title"> Tytuł: </label><input type="text" name="title" id="title" value="<?php echo $dane['title'];?>" required>
        <label for="shortcontent"> Wprowadzenie: </label>
        <textarea name="shortcontent" id="shortcontent" required><?php echo $dane['shortcontent'];?></textarea>
        <label for="content"> Treść: </label>
        <textarea name="content" id="content" required><?php echo $dane['content'];?></textarea>


        </div>
        <!-- <div class="rowNavForm">
            <input type="submit" name="reset" value="Anuluj">
            <input type="submit" name="submit" value="Aktualizuj">
        </div> -->

<div class="field-tags">
    <p>Tagi:</p>
    <div class="one">
        <input type=text name="tags_name" value="<?php echo $itemtags; ?>">
    </div>
</div>

<div class="field-tags-list">
    Tagi już wykorzystywane w blogach: 
    <?php 
    foreach ($tags->getTagsName() as $row) {
        echo '<div class="itemtag">'.$row['name_tag'].'</div>';
    }
    ?>
</div>

</form>

