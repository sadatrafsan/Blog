<? if (!$U->status()){ ?>
<h3>
    <?
    if (isset($_GET['logout']) && !empty($_GET['logout'])) {

        echo "You have logged out!";
    }else{
        
        echo "Login ";
    }
    ?>
</h3>
<hr>
<form action="login.php" method="POST">
    <table width="100%" align="center" cellpadding="3" cellspacing="3">
        <tr>
            <td>E-mail:</td>
            <td><input type="text" name="email" placeholder="Your E-mail" required="required"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" placeholder="Your Password" required="required"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Login"></td>
            <td><a href="registration.php">Register Now</a></td>
        </tr>
    </table>
</form>
<? 
}else{
    
    if(strpos($_SERVER['PHP_SELF'], 'profile.php')){
        
        require("logged.php");
    }
} 
?>

