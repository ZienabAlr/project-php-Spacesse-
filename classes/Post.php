<?php 

class Post {

    private $title;
    private $description; 
    private $image; 
    
    public function setTitle($title) {
    
        $this->title = $title;
        return $this;
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function setDescription($description) {
    
        $this->description = $description;
        return $this;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function setImage($image) {
    
        $this->image = $image;
        return $this;
    }
    
    public function getImage(){
        return $this->image;
    }
    public function create_post(){
        
        $conn = Db::getConnection();
        $statement = $conn->prepare("INSERT INTO post (title, description, image) VALUES (:title, :description, :image)");
        $statement->bindValue("title", $this->title);
        $statement->bindValue("description", $this->description);
        $statement->bindValue("image", $this->image);
        return $statement->execute();

        //strtolower converts a string to lowercase.--> verandert hoofdletters naar kleine letters 
    }   
    
    public static function show_post(){

        $conn = Db::getConnection();
        $statement = $conn->prepare("SELECT * FROM post");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
}
