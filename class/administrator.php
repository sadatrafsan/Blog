<?php

class Administrator extends Sanitize {
    
    private $connect;
    private $log = false;
    public $admin_id;
    
    function __construct() {
        
        $this->connect = new Connection();
        
        session_start();
        
        $this->check();
    }
    
    private function check(){
        
        if(isset($_SESSION['admin_id'])){
            
            $this->admin_id = $_SESSION['admin_id'];
            $this->log = true;
        }
        else{
            
            unset($this->admin_id);
            $this->log = false;
        }
    }
    
    public function status(){
        
        return $this->log;
    }
    
    public function authenticate($email,$password){
        
        $email = $this->filtering($email);
        $password = $this->filtering($password);
        
        $sql = "SELECT admin_id 
                FROM admin
                WHERE admin_email='{$email}' AND admin_password='{$password}' LIMIT 1";
                
        $result = mysql_query($sql);
        
        return $result;
    }
    
    public function login($found){
          
        if($found){
            
            $row = mysql_fetch_assoc($found);
            $this->admin_id = $_SESSION['admin_id'] = $row['admin_id'];
            $this->log = true;
        }
    }
    
    public function logout(){
        
        unset($_SESSION['admin_id']);
        unset($this->admin_id);
        $this->log = false;
    }
    
    public function inactive($inactive_id){
        
        $inactive_id = $this->filtering($inactive_id);
                
        mysql_query("UPDATE user SET activity=0 WHERE user_id='$inactive_id'");
    }
    
    public function active($active_id){
        
        $active_id  = $this->filtering($active_id);
        
        mysql_query("UPDATE user SET activity=1 WHERE user_id='$active_id'");
    }
    
    public function erase($erase_id){
        
        $erase_id = $this->filtering($erase_id);
        
        mysql_query("DELETE FROM user WHERE user_id='$erase_id'");
    }
    
    public function hide($hide_id){
        
        $hide_id = $this->filtering($hide_id);
        
        mysql_query("UPDATE article SET publication_status=0 WHERE article_id='{$hide_id}'");
    }
    
    public function publish($publish_id){
        
        $publish_id = $this->filtering($publish_id);
        
        mysql_query("UPDATE article SET publication_status=1 WHERE article_id='{$publish_id}'");
    }
    
    public function dump($erase_id){
        
        $erase_id = $this->filtering($erase_id);
        
        mysql_query("DELETE FROM article WHERE article_id='{$erase_id}'");
    }
    
    public function addCategory($array){
        
        array_walk($array, "sanitizing");
        
        $category_name = $array['category_name'];
        
        $sql = "INSERT INTO category (category_name) VALUES ('$category_name')";
        mysql_query($sql);
    }
    
    public function exist($email){
        
        $email = $this->filtering($email);
        
        $sql = "SELECT COUNT('admin_id') FROM admin WHERE admin_email='$email'";
        $run = mysql_query($sql);
        $result = mysql_result($run, 0);

        return ($result == 1) ? TRUE : FALSE;
    }
    
    public function createStaff($array){
        
        array_walk($array, "sanitizing");
        
        $admin_name = $array['admin_name'];
        $admin_email = $array['admin_email'];
        $admin_password = hash("SHA256",$array['admin_password']);
        
        $sql = "INSERT INTO admin (admin_name,admin_email,admin_password)
                VALUES
                ('$admin_name','$admin_email','$admin_password')";
        mysql_query($sql);
    }
    
    function __destruct() {
        
        unset($this->connect);
    }
}

?>
