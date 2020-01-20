<?php

    session_start();

    require "vendor/autoload.php";
    include "classes/Users.php";

    // Connection to the server
    $connection = new MongoDB\Client;

    // Connection to the database
    $db = $connection->bookstore;

    // Connection to the collection users
    $collection_users = $db->users;

    $userClass = new Users($collection_users);

    //var_dump($userClass);
?>