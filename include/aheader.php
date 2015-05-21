<?php require_once("../class/ini.php"); ?>
<?php if(!$S->status()){ header("Location: login.php"); } ?>
<!DOCTYPE html>
<html>
    <head>
        <title>
        <?
            $prefix = "Admin | ";

            $pagename = ucfirst(basename($_SERVER['PHP_SELF'], ".php"));

            if ($pagename == "Index") {

                echo $prefix . "Home";
            }else{

                echo $prefix . "" . $pagename;
            }
        ?>
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" href="../css/grid.css" rel="stylesheet">
        <script src="../javascript/confirmation.js"></script>
    </head>
    <body>
        <div id="wrapper">
            
            <header>
                <div id="logo">
                    <img src="../image/.png" height="146" width="226" alt="logo">
                </div>
                <div id="banner">
                    
                </div>
            </header>
            <?php include("layout/anav.php"); ?>
            <div id="subheader">
                    
            </div>
            <section class="clearfix">
                <?php require("layout/aside.php"); ?>
                <div id="content">
