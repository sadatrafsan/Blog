<?php

class Sanitize {
    
    protected function filtering($data) {

        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlentities($data);
        $data = mysql_real_escape_string($data);

        return $data;
    }

    protected function sanitizing(&$data) {

        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlentities($data);
        $data = mysql_real_escape_string($data);
    }
    

}

?>
