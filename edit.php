<?php require_once("include/header.php"); ?>
<?php if(!$U->status()){ header("Location: index.php"); } ?>
<?
if(isset($_GET['success']) && !empty($_GET['success'])){
    
    echo "<h3>Blog Updated!</h3>";
    
}else{
    
    if (isset($_POST) && !empty($_POST)) {

        $U->edit($_POST);
        header("Location: edit.php?success=1");
        exit();
        
    }
    else{ 

        if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){

            $article_id = $_GET['edit_id'];
            $row = $A->getArticleByid($article_id);
            
            $article_title = $row['article_title'];
            $description = $row['description'];

        }
        ?>

        <h3>Write One!</h3>

        <form action="edit.php" method="POST"> 
            <table cellspacing="5" cellpadding="5" align="left" width="60%">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="hidden" name="article_id" value="<? echo $article_id; ?>">
                        <input type="text" name="article_title" value="<? echo $article_title; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Article</td>
                    <td>
                        <textarea name="description" rows="10" cols="60"><? echo $description; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td><input type="reset" name="reset" value="Reset"></td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
        <?
    }
}
?>
<?php require_once("include/footer.php"); ?>