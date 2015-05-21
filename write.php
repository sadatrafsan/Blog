<?php require_once("include/header.php"); ?>
<?php if(!$U->status()){ header("Location: index.php"); } ?>
<?
if(isset($_GET['success']) && !empty($_GET['success'])){
    
    echo "<h3>Blog Posted!</h3>";
    
}else{
    
    if (isset($_POST) && !empty($_POST)) {

        $U->write($_POST);
        header("Location: write.php?success=1");
        exit();
        
    }
    else{ ?>

        <h3>Write One!</h3>

        <form action="write.php" method="POST"> 
            <table cellspacing="5" cellpadding="5" align="left" width="60%">
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category_id">
                            <option value="">-Select-</option>
                            <? $result = $A->menu(); ?>
                            <? while ($row = mysql_fetch_array($result)) { ?>
                                <option value="<? echo $row['category_id']; ?>">
                                    <? echo $row['category_name']; ?>
                                </option>
                            <? } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="hidden" name="user_id" value="<? echo $U->user_id; ?>">
                        <input type="text" name="article_title" required="required">
                    </td>
                </tr>
                <tr>
                    <td>Article</td>
                    <td>
                        <textarea name="description" rows="10" cols="60"></textarea>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Submit"></td>
                    <td><input type="reset" name="reset" value="Reset"></td>
                </tr>
            </table>
        </form>
        <?
    }
}
?>
<?php require_once("include/footer.php"); ?>