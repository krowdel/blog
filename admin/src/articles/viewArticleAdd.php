<?php 

$header=[
    'title'=>'Tworzenie nowego posta',
    'subtitle'=>''
];
include '../initArticle.php';
include DIR_VIEW.'admin-header.php';
$categoriesActiv=$categories->getAllCategories();
// var_dump($categoriesActiv);
// $contentTag='';
// foreach ($tags->getTagsName() as $row) { $contentTag.=$row['name_tag'].', '; }
// $contentTag=substr($contentTag, 0, -2);
?>


<section class="bl-admin-nav">
    <button data-home>Powrót</button>
    <div class="group-button">
        <button data-reset>Anuluj</button>
        <button data-akcept>Zapisz</button>
    </div>
</section>

<form  method="post" class="articles-form">
    <div class= "form-edit-add" >
        <span class="img-upload"> </span>
        <div class="article-seting-top">
            <div class="file-upload">
                <input type="file" id="cover" name="cover" accept="image/png, image/jpeg">
            </div>
            <div class="input-category input-select">
                Kategoria
                <select name="idCategory">
                    <?php 
                    foreach($categoriesActiv as $row) {
                        echo '<option value="'.$row['id_category'].'">'.$row['name'].'</option>';
                    } 
                    ?>
                </select>
            </div>
            <?php include DIR_VIEW.'option-lang.php'; ?>
            <div id="switchRadio">
                <input type="radio" name="published" value=0 id="published" checked/>
                <label for="published"> Publikacja </label>
                <input type="radio" name="published" value=1 id="published" />
                <label for="published"> Szkic </label>
            </div>
        </div>
    <label for="title"> Tytuł: </label>       <input type="text" name="title" id="title" required>
    <label for="short"> Wprowadzenie: </label>
    <input type="text" name="shortcontent" id="short" required>
    <label for="content"> Treść: </label>     
    <textarea id="content" name="content"  required>  </textarea>


    </div>
    <!-- <div class="rowNavForm">
        <input type="submit" name="reset" value="Anuluj">
        <input type="submit" name="akcept" value="Zapisz">
    </div> -->

<div class="field-tags">
    <p>Tagi:</p>
    <div class="one">
        <input type=text name="tags_name" value="">
    </div>
</div>
<div class="field-tags-list">
    Tagi już wykorzystywane w bloogach: 
    <?php 
    foreach ($tags->getTagsName() as $row) {
        echo '<div class="itemtag">'.$row['name_tag'].'</div>';
    }
    ?>
</div>
</form>