<?php

    session_start();

    require "vendor/autoload.php";
    include "classes/Users.php";
    include "classes/Books.php";

    // Connection to the server
    $connection = new MongoDB\Client;

    // Connection to the database
    $db = $connection->bookstore;

    // Connection to the collection users
    $collection_users = $db->users;
    $collection_books = $db->books;

    $userClass = new Users($collection_users);
    $booksClass = new Books($collection_books);

    //var_dump($userClass);
?>