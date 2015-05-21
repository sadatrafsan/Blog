<?php
class Article extends Sanitize {
    
    private $connect;
    
    function __construct() {
        
        $this->connect = new Connection();
    }
    
    function menu(){
        
        $sql = "SELECT * FROM category";
        $result = mysql_query($sql);
        
        return $result;
    }
    
    function submenu($category_id){
        
        $category_id = $this->filtering($category_id);
        
        $sql = "SELECT * FROM article WHERE category_id='{$category_id}' ORDER BY (article_id) DESC";
        $result = mysql_query($sql);
        
        return $result;
    }
    
    function blog(){
        
        $result = mysql_query("SELECT * FROM article");
        
        return $result;
    }
    
    function description($article_id){
        
        $article_id = $this->filtering($article_id);
        
        $sql = "SELECT * FROM article WHERE article_id='{$article_id}'";
        $result = mysql_query($sql);
        
        return $result;
    }
    
    function optimized($selected_category){
        
        $selected_category = $this->filtering($selected_category);
        
        $sql = "SELECT * FROM article WHERE category_id='{$selected_category}' ORDER BY (article_id) DESC";
        $result = mysql_query($sql); 
        $row = mysql_fetch_assoc($result);
       
        return $row['article_id'];
    }
    
    public function getArticleByid($article_id){
        
        $article_id = $this->filtering($article_id);
        
        $sql = "SELECT * FROM article WHERE article_id='{$article_id}'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        
        return $row;
    }
    
    public function getCategoryByid($article_id){
        
        $article_id = $this->filtering($article_id);
        
        $sql = "SELECT * FROM article WHERE article_id='{$article_id}'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        
        return $row['category_id'];
    }
    
    public function getCategoryNameByid($category_id){
        
        $category_id = $this->filtering($category_id);
        
        $sql = "SELECT category_name FROM category WHERE category_id='{$category_id}'";
        $result = mysql_query($sql);
        $row = mysql_fetch_assoc($result);
        
        return $row['category_name'];
    }
    
    function __destruct() {
        
        unset($this->connect);
    }
}

?>
