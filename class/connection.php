<? require("constant.php"); ?>
<?php

class Connection {
    
    private $connector;
    private $database;
    
    function __construct() {
        
        $this->connector = mysql_connect(HOST, USER, PASSWORD);
	$this->database = mysql_select_db(DATABASE);

	if(!@$this->connector || !@$this->database){
  
		die('Database connection failed!'.mysql_error());
	}
    }
     
    function __destruct() {
        
        if( gettype($this->connector) == "resource") {
        
            mysql_close($this->connector);
            unset($this->connector);
            unset($this->database);
        }
    }
}

?>
