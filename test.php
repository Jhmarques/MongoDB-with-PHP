<?php
    include "init.php";

    // searching one document and using projection
    $document = $collection_users->findOne([
        "username"=>"joao",
        "password"=>"123"
    ], ["projection"=>["_id"=>0, "admin"=>0]]);

    // create a cursor and iterate to see the data that was retrieved by MongoDB
    $document = $collection_users->find();
    foreach($document as $val) {
        //var_dump($val->username);
    }

    // use projection together with limit functionality
    $document = $collection_users->find([], ["projection"=>["_id"=>0, "admin"=>0], 'limit'=>2]);
    foreach($document as $val) {
        echo "<pre>";
        var_dump($val);
        echo "</pre>";    
    }

    //var_dump($document);
?>