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
}
?>