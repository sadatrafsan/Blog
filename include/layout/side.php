<?
if(strpos($_SERVER['PHP_SELF'], 'window.php')){

    require("widget/menubar.php");
}
else if(!strpos($_SERVER['PHP_SELF'], 'registration.php')){

    require("widget/logbar.php");
}
?>
