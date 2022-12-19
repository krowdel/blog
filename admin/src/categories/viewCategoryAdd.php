<?php 

$header=[
    'title'=>'Dodawanie nowej kategori',
    'subtitle'=>''
];
include '../initCategory.php';
include DIR_VIEW.'admin-header.php';
?>


<section class="bl-admin-nav">
    <button data-home>Powrót</button>
    <div class="group-button">
        <button data-reset>Anuluj</button>
        <button data-akcept>Zapisz</button>
    </div>
</section>

<form  method="post" class="category-form">
    <div class= "form-edit-add" >
        <label for="title"> Nazwa kategori: </label> <input type="text" name="name" id="name" required>
        <span> </span>
        <div class="article-seting-top">
            <?php include DIR_VIEW.'option-lang.php'; ?>
            <div id="switchRadio">
                <input type="radio" name="active" value=0 id="active" checked/>
                <label for="active"> Aktywna </label>
                <input type="radio" name="active" value=1 id="active" />
                <label for="active"> Wyłączona </label>
            </div>
        </div>
    </div>
    <!-- <div class="rowNavForm">
        <input type="submit" name="reset" value="Anuluj">
        <input type="submit" name="akcept" value="Zapisz">
    </div> -->
</form>