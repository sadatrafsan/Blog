<?php require_once("../include/aheader.php"); ?>                    
<?
if(isset($_GET['inactive_id']) && !empty($_GET['inactive_id'])) {

    $inactive_id = $_GET['inactive_id'];
    $S->inactive($inactive_id);
    header("Location: member.php");
} 
else if(isset($_GET['active_id']) && !empty($_GET['active_id'])) {

    $active_id = $_GET['active_id'];
    $S->active($active_id);
    header("Location: member.php");
} 
else if(isset($_GET['erase_id']) && !empty($_GET['erase_id'])) {

    $erase_id = $_GET['erase_id'];
    $S->erase($erase_id);
    header("Location: member.php");
}
?>

<h3>Member Information</h3>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Date of Birth</th>
        <th>Sex</th>
        <th>Action</th>
    </tr>
    <? $result = $U->member(); ?>
    <? while ($row = mysql_fetch_array($result)) { ?>
    <tr>
       <td><? echo $row['user_id']; ?></td>
       <td><? echo $row['first_name']." ".$row['last_name']; ?></td>
       <td><? echo $row['user_email']; ?></td>
       <td><? echo $row['dob']; ?></td>
       <td><? echo $row['sex']; ?></td>
       <td> 
           <a href="member.php?erase_id=<? echo $row['user_id']; ?>" onClick="return confirmation();">Delete</a> | 
    <? if ($row['activity'] == 1) { ?>
           <a href="member.php?inactive_id=<? echo $row['user_id']; ?>" onClick="return confirmation();">Inactive</a>
    <? } else { ?>
           <a href="member.php?active_id=<? echo $row['user_id']; ?>" onClick="return confirmation();">Active</a>
    <? } ?>
       </td>
    </tr>
     <? } ?>
</table>
<?php require_once("../include/afooter.php"); ?>