<?php
class User extends Sanitize {
    
    private $connect;
    private $log = false;
    public $user_id;
    
    function __construct() {
        
        $this->connect = new Connection();
        
        $this->check();
    }
    
    private function check(){
        
        if(isset($_SESSION['user_id'])){
            
            $this->user_id = $_SESSION['user_id'];
            $this->log = true;
        }
        else{
            
            unset($this->user_id);
            $this->log = false;
        }
    }
    
    public function status(){
        
        return $this->log;
    }
    
    public function authenticate($email,$password){
        
        $email = $this->filtering($email);
        $password = $this->filtering($password);
        
        $sql = "SELECT user_id 
                FROM user
                WHERE user_email='{$email}' AND user_password='{$password}' LIMIT 1";
                
        $result = mysql_query($sql);
        
        return $result;
    }
    
    public function login($found){
          
        if($found){
            
            $row = mysql_fetch_assoc($found);
            $this->user_id = $_SESSION['user_id'] = $row['user_id'];
            $this->log = true;
        }
    }
    
    public function logout(){
        
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->log = false;
    }
    
    public function register($array){
        
        array_walk($array, "sanitizing");
        
        $first_name = $array['first_name'];
        $last_name = $array['last_name'];
        $user_email = $array['user_email'];
        $password = hash("SHA256",$array['user_password']);
        $dob = $array['day'].":".$array['month'].":".$array['year'];
        $sex = $array['sex'];
        
        $sql = "INSERT INTO user (first_name, last_name, user_email, user_password, dob, sex)
                VALUES 
                ('$first_name','$last_name','$user_email','$password','$dob','$sex')";
        
        mysql_query($sql);
    }
    
    public function exist($email){
        
        $email = $this->filtering($email);
        
        $sql = "SELECT COUNT('user_id') FROM user WHERE user_email='$email'";
        $run = mysql_query($sql);
        $result = mysql_result($run, 0);

        return ($result == 1) ? TRUE : FALSE;
    }

    public function member(){
        
        $sql = "SELECT * FROM user";
        $result = mysql_query($sql);
        
        return $result;
    }
    
    public function author($user_id){
        
        $user_id = $this->filtering($user_id);
        
        $sql = "SELECT first_name, last_name FROM user WHERE user_id='{$user_id}'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        
        echo $row['first_name']." ". $row['last_name'];
    }
    
    public function write($array){
        
        array_walk($array, "sanitizing");
        
        $category_id = $array['category_id'];
        $user_id = $array['user_id'];
        $article_title = $array['article_title'];
        $description = $array['description'];
        
        $sql = "INSERT INTO article
                (category_id,user_id,article_title,description) VALUES 
                 ('$category_id','$user_id','$article_title','$description')";
        
        mysql_query($sql);
    }
    
    public function dump($erase_id){
        
        $erase_id = $this->filtering($erase_id);
        
        mysql_query("DELETE FROM article WHERE article_id='{$erase_id}'");
    }
    
    public function edit($array){
        
        array_walk($array, "sanitizing");
        
        $article_id = $array['article_id'];
        $article_title = $array['article_title'];
        $description = $array['description'];
        
        $sql = "UPDATE article SET
                article_title = '$article_title',
                description = '$description'
                WHERE article_id='{$article_id}'";
        
        mysql_query($sql);
    }
    
    function __destruct() {
        
        unset($this->connect);
    }
    
}

?>
