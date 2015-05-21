<?php require_once("../include/aheader.php"); ?>
<h3>Add Category</h3>

<?
if (isset($_GET['success']) && !empty($_GET['success'])){
    
    echo "<p>Category Addition Successful!</p>";
}
else{

    if(isset($_POST) && !empty($_POST)){

        $S->addCategory($_POST);
        header("Location: add.php?success=1");
        exit();
    }
    else{
    ?>
        <form action="add.php" method="POST"> 
            <table>
                <tr>
                    <td>Category Name</td>
                    <td><input type="text" name="category_name" placeholder="Category Name" required="required"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Add"></td>
                    <td><input type="reset" name="reset" value="Reset"></td>
                </tr>
            </table>
        </form>
<?
        } 
}
?>
<?php require_once("../include/afooter.php"); ?>