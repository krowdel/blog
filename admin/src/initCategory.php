<?php
$json =  file_get_contents('../../config.json');
$config= json_decode($json);
define('DIR_VIEW', '../../view/');

include '../../source/Blog.php';
include '../../controllers/Categories.php';

$categories = new Categories;
$get=$_POST;

