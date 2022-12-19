<?php

$json =  file_get_contents('../../config.json');
$config= json_decode($json);
define('DIR_VIEW', '../../view/');
$fileUrl=$config->coverUrl.'cover-';
$coverView=$config->coverView.'cover-';


include '../../source/Blog.php';
include '../../tools/ImageTools.php';
include '../../controllers/Articles.php';
include '../../controllers/Categories.php';
include '../../controllers/Tags.php';

$articles = new Articles;
$categories = new Categories;
$tags = new Tags; 

$get=$_POST;

