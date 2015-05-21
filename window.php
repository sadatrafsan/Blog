<?php include("include/header.php"); ?>

<?
$result = $A->description($selected_article);
$row = mysql_fetch_assoc($result);
$user_id = $row['user_id'];
?>

<h3><? echo $row['article_title']; ?></h3>
<h4>by <? echo $U->author($user_id); ?></h4>
<hr>
<p><? echo $row['description']; ?></p>
<?php include("include/footer.php"); ?>