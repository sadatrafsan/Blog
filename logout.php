<?php require_once("class/ini.php"); ?>
<?php 
if($U->status()){
    
    $U->logout();
    header("Location: index.php?logout=1"); 
}
else{
    
    header("Location: index.php");
}
?>