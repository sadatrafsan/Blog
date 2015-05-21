<?php include("include/header.php"); ?>
<?php if($U->status()){ header("Location: profile.php"); } ?>
<h3>Registration</h3>

<?
if(isset($_GET['success']) && !empty($_GET['success']) &&($_GET['success'] == 1)){
    
    echo "<p>Registration Successful!</p>";
}
else if(isset($_GET['success']) && !empty($_GET['success']) && ($_GET['success'] == 2)){
    
    echo "<p>E-mail existed! Choose another one</p>";
}
else{

    if(isset($_POST) && !empty($_POST)){
        
        if($U->exist($_POST['user_email'])){
            
            header("Location: registration.php?success=2");
            exit();
        }
        else{
            
            $U->register($_POST);
            header("Location: registration.php?success=1");
            exit();
        }
    }
    else{
    ?>
        <form action="registration.php" method="POST"> 
            <table cellspacing="5" cellpadding="5" align="left" width="60%">
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="first_name" placeholder="First Name" required="required"></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="last_name" placeholder="Last Name" required="required"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="user_email" placeholder="E-mail" required="required"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="user_password" placeholder="Password" required="required"></td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>
                        <select name="day">
                            <option value="">Day</option>
                            <? for ($i = 1; $i < 32; $i++) { ?>
                                <option value="<? echo $i; ?>"><? echo $i; ?></option>
                            <? } ?>
                        </select>
                        <select name="month">
                            <option value="">Month</option>
                            <? for ($i = 1; $i < 12; $i++) { ?>
                                <option value="<? echo $i; ?>"><? echo $i; ?></option>
                            <? } ?>
                        </select>
                        <select name="year">
                            <option value="">Year</option>
                            <? for ($i = 1900; $i < 2015; $i++) { ?>
                                <option value="<? echo $i; ?>"><? echo $i; ?></option>
                            <? } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Sex</td>
                    <td>
                        <select name="sex">
                            <option value="">-Select-</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Register"></td>
                    <td><input type="reset" name="reset" value="Reset"></td>
                </tr>
            </table>
        </form>
<?
        } 
}
?>
<?php include("include/footer.php"); ?>