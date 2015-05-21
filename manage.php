<?php include("include/header.php"); ?>
<?php if(!$U->status()){ header("Location: index.php"); } ?>
<?
if(isset($_GET['drop_id']) && !empty($_GET['drop_id'])) {

    $drop_id = $_GET['drop_id'];
    $U->dump($drop_id);
    header("Location: blog.php");
    exit();
} 
?>

<h3>Blog Information</h3>
<table>
    <tr>
        <th>Title</th>
        <th>Action</th>
    </tr>
    <? $result = $A->blog(); ?>
    <? while ($row = mysql_fetch_array($result)) { ?>
    <tr>
       <td><? echo $row['article_title']; ?></td>
       <td> 
           <a href="manage.php?drop_id=<? echo $row['article_id']; ?>" onClick="return confirmation();">Delete</a> | 
           <a href="edit.php?edit_id=<? echo $row['article_id']; ?>" onClick="return confirmation();">Edit</a>
       </td>
    </tr>
     <? } ?>
</table>
<?php include("include/footer.php"); ?>
