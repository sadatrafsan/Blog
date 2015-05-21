<?php require_once("../class/ini.php"); ?>
<?php 
if($S->status()){
    
    $S->logout();
    header("Location: login.php?login=1"); 
}
else{
    
    header("Location: login.php");
}
?>