<title>
    <?
        $prefix = "Welcome | ";

        $pagename = ucfirst(basename($_SERVER['PHP_SELF'], ".php"));

        if ($pagename == "Index") {

            echo $prefix . "Home";
        }else{

            echo $prefix . "" . $pagename;
        }
    ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link type="text/css" href="css/default.css" rel="stylesheet">
<link type="text/css" href="css/slider.css" rel="stylesheet">
<script src="javascript/jquery-2.1.1.min.js"></script>
<script src="javascript/slider.js"></script>
