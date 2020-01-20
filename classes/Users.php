<?php
class Users {
    protected $collection_users;    // bookstore.users
    
    public function __construct($collection_users) {
        $this->collection_users = $collection_users;
    }
    
    public function checkInput($var) {
        $var = htmlspecialchars($var);
        $var = trim($var);
        $var = stripslashes($var);
        
        return $var;
    }
    
    public function register($username, $password, $email) {
        $document = $this->collection_users->insertOne([
            "username"=>$username,
            "password"=>$password,
            "email"=>$email,
            "admin"=>"no"
        ]);
        
        $_SESSION["user_id"] = $document->getInsertedId();
    }
    
    public function userData($userId) {
        // retrieving an object with properties of the document searched by ID when the ID was created automatically for us by Mongo server
        $document = $this->collection_users->findOne([
            "_id"=>new MongoDB\BSON\ObjectID($userId)
        ]);
        
        return $document;
    }
    
    public function logout() {
        $_SESSION = array();
        session_destroy();
        header("Location: index.php");
    }
}
?>