<?php require("../include/aheader.php"); ?>                    
<?
if (isset($_GET['hide_id']) && !empty($_GET['hide_id'])) {

    $hide_id = $_GET['hide_id'];
    $S->hide($hide_id);
    header("Location: blog.php");
} else if (isset($_GET['publish_id']) && !empty($_GET['publish_id'])) {

    $publish_id = $_GET['publish_id'];
    $S->publish($publish_id);
    header("Location: blog.php");
} else if (isset($_GET['drop_id']) && !empty($_GET['drop_id'])) {

    $drop_id = $_GET['drop_id'];
    $S->dump($drop_id);
    header("Location: blog.php");
}
?>

<h3>Blog Information</h3>
<table>
    <tr>
        <th>Id</th>
        <th>Category</th>
        <th>Author</th>
        <th>Title</th>
        <th>Action</th>
    </tr>
    <? $result = $A->blog(); ?>
    <? while ($row = mysql_fetch_array($result)) { ?>
    <tr>
       <td><? echo $row['article_id']; ?></td>
       <td><? echo $A->getCategoryNameByid($row['category_id']); ?></td>
       <td><? echo $U->author($row['user_id']); ?></td>
       <td><? echo $row['article_title']; ?></td>
       <td> 
           <a href="blog.php?drop_id=<? echo $row['article_id']; ?>" onClick="return confirmation();">Delete</a> | 
    <? if ($row['publication_status'] == 1) { ?>
           <a href="blog.php?hide_id=<? echo $row['article_id']; ?>" onClick="return confirmation();">Hide</a>
    <? } else { ?>
           <a href="blog.php?publish_id=<? echo $row['article_id']; ?>" onClick="return confirmation();">Publish</a>
    <? } ?>
       </td>
    </tr>
     <? } ?>
</table>
<?php require("../include/afooter.php"); ?>