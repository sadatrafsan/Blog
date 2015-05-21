<?php require_once("connection.php"); ?>
<?php require_once("sanitize.php"); ?>
<?php require_once("administrator.php"); ?>
<?php require_once("user.php"); ?>
<?php require_once("article.php"); ?>
<?php $S = new administrator(); ?>
<?php $A = new Article(); ?>
<?php $U = new User(); ?>
<?php

if(isset($_GET['category'])){
    
    $selected_category = $_GET['category'];
    $selected_article = $A->optimized($selected_category);
    
}
else if(isset($_GET['article'])){
    
    $selected_category = $A->getCategoryByid($_GET['article']);
    $selected_article = $_GET['article'];
}
else{
    
    $selected_category = 1;
    $selected_article = $A->optimized(1);
}
?>