<?php require_once("../include/aheader.php"); ?>
<h3>Create Staff</h3>

<?
if(isset($_GET['success']) && !empty($_GET['success']) &&($_GET['success'] == 1)){
    
    echo "<p>Staff Created!</p>";
}
else if(isset($_GET['success']) && !empty($_GET['success']) && ($_GET['success'] == 2)){
    
    echo "<p>E-mail existed! Choose another one</p>";
}
else{

    if(isset($_POST) && !empty($_POST)){
        
        if($S->exist($_POST['admin_email'])){
            
            header("Location: registration.php?success=2");
            exit();
        }
        else{
            
            $S->createStaff($_POST);
            header("Location: staff.php?success=1");
            exit();
        }
        
    }
    else{
    ?>
        <form action="staff.php" method="POST"> 
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="admin_name" placeholder="Admin Name" required="required"></td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><input type="email" name="admin_email" placeholder="Email" required="required"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="text" name="admin_password" placeholder="Password" required="required"></td>
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