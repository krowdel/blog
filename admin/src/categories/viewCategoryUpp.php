<?php
include '../initCategory.php';
// var_dump($get);
$dane=$categories->getCategory($get['id']);

$header=[
    'title'=>'Edycja kategorii: ',
    'subtitle'=>$dane['name']
];
include DIR_VIEW.'admin-header.php';

?>

<section class="bl-admin-nav">
    <button data-home>Powrót</button>
    <div class="group-button">
        <button data-reset>Anuluj</button>
        <button data-akcept>Zapisz</button>
    </div>
</section>

<form method="post" class="category-form">
    <input type="hidden" name="id" value="<?php echo $dane['id_category'];?>" >

    <div class= "form-edit-add">    
        <label for="name"> Nazwa kategorii: </label><input type="text" name="name" id="name" value="<?php echo $dane['name'];?>" required>
        <span></span>
        <div class="article-seting-top">
            <?php include DIR_VIEW.'option-lang.php'; ?>
            <div id="switchRadio">
                <input type="radio" name="published" value=0 id="vat_payer_no" <?php echo (!$dane['active']? 'checked':'');?> />
                <label for="vat_payer_no"> Aktywna </label>

                <input type="radio" name="published" value=1 id="vat_payer_yes"  <?php echo ($dane['active']? 'checked':'');?> />
                <label for="vat_payer_yes"> Nie dostępna </label>
            </div>
    </div>
        

    </div>
    <!-- <div class="rowNavForm">
        <input type="submit" name="reset" value="Anuluj">
        <input type="submit" name="submit" value="Aktualizuj">
    </div> -->
</form>
