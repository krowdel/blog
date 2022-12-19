<?php 
    error_reporting(E_ALL);
    // include '../admin/class/Blog.php';
    $urlBaze='src/blog/';
    $urlBaze='';
    
    $json =  file_get_contents($urlBaze.'admin/config.json');
    $config= json_decode($json);
    $get=$_POST;
    
    // var_dump($config);
    // var_dump(__DIR__);
    // var_dump(__FILE__);
    // var_dump($get);

?>

<link rel="stylesheet" href="<?php echo $urlBaze; ?>css/style.css?wer=32">
<link rel="stylesheet" href="<?php echo $urlBaze; ?>css/styleTags.css?wer=32">
<section class="body-adminblog">

    <div class="navblog">
        <form action="<?php echo $urlBaze; ?>index.php" method="post">
            <input type="hidden"  name="actionblog" value="articles">
            <input type="submit" value="Artykuły">
        </form>
        <form action="<?php echo $urlBaze; ?>index.php" method="post">
            <input type="hidden"  name="actionblog" value="categories">
            <input type="submit" value="Kategorie">
        </form>
        <form action="<?php echo $urlBaze; ?>index.php" method="post">
            <input type="hidden"  name="actionblog" value="tags">
            <input type="submit" value="Tagi">
        </form>
    </div>

    <?php /*
    <div class="navblog">
        <form action="index.php3" method="post">
            <input type="hidden"  name="index" value="admin">
            <input type="hidden"  name="subind" value="blog">
            <input type="hidden"  name="actionblog" value="articles">
            <input type="submit" value="Artykuły">
        </form>

        <form action="index.php3" method="post">
            <input type="hidden"  name="index" value="admin">
            <input type="hidden"  name="subind" value="blog">
            <input type="hidden"  name="actionblog" value="categories">
            <input type="submit" value="Kategorie">
        </form>
        <form action="index.php3" method="post">
            <input type="hidden"  name="index" value="admin">
            <input type="hidden"  name="subind" value="blog">
            <input type="hidden"  name="actionblog" value="tags">
            <input type="submit" value="Tagi">
        </form>
    </div>
    */ ?>

    <div class="contentblog">
        <div id="alert"></div>
        <?php 
            if (!isset($get['actionblog'])) {
                $get['actionblog']='articles';
            }
            
            switch ($get['actionblog']) {
                case 'articles': echo '<div id="contentFetchArticle"> not load JS content article </div>'; break;
                case 'categories': echo '<div id="contentFetchCategory"> not load JS content category </div>'; break;
                case 'tags': echo '<div id="contentFetchTags"> not load JS content tags</div>'; break;
                default: echo '<div id="contentFetchArticle"> not load Js content article default </div>';
            }
        ?>
    </div>
    

</section>
<footer>
<?php
// var_dump(gd_info());
// phpinfo();
?>
</footer>


<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

<?php /* 
    <script src="js/ckeditor5/ckeditor.js"></script>
    <script src="js/ckeditor5/config.js"></script>
*/ ?>

<script src="<?php echo $urlBaze; ?>js/inputFileImageView.js"></script>
<script src="<?php echo $urlBaze; ?>js/SwitchRadio.js"></script>
<script src="<?php echo $urlBaze; ?>js/DivInfo.js"></script>
<script src="<?php echo $urlBaze; ?>js/ValidateForm.js"></script>

<script src="<?php echo $urlBaze; ?>js/ajax/ajaxArticles.js"></script>
<script src="<?php echo $urlBaze; ?>js/ajax/ajaxCategories.js"></script>
<script src="<?php echo $urlBaze; ?>js/ajax/ajaxTags.js"></script>

<script src="<?php echo $urlBaze; ?>js/MoreArticle.js"></script>
<script src="<?php echo $urlBaze; ?>js/scripTags.js"></script>
<script>
    if (document.getElementById('contentFetchArticle')) {
        new Promise((resolve, reject)=>{
            const ajaxArticles = new AjaxArticles('<?php echo $urlBaze; ?>');
            resolve();
         }) 
        .then (()=>{})
    }
    if (document.getElementById('contentFetchCategory')) {
        new Promise((resolve, reject)=>{
            const ajaxCategories = new AjaxCategories('<?php echo $urlBaze; ?>');
            resolve();
         }) 
        .then (()=>{})
    }
    if (document.getElementById('contentFetchTags')) {
        new Promise((resolve, reject)=>{
            const ajaxCategories = new AjaxTags('<?php echo $urlBaze; ?>');
            resolve();
         }) 
        .then (()=>{})
    }
</script>
<?php
