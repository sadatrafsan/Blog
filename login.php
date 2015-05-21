<?php require_once("class/ini.php"); ?>
<?php if ($U->status()){ header("Location: profile.php"); } ?>
<?
if (isset($_POST) && !empty($_POST)) {

    $email = $_POST['email'];
    $password = hash("SHA256", $_POST['password']);
    $found = $U->authenticate($email, $password);

    if ($found) {

        $U->login($found);
        header("Location: profile.php");
        
    }else{

        echo "<h3>Username/Password mismatched!</h3>";
    }
}
?>