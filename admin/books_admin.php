<?php
    //book, category, author, price, description, cover_img, insert_book
    include "../init.php";

    if(isset($_POST["insert_book"])) {
        if(!empty($_POST["book"]) && !empty($_POST["category"]) && !empty($_POST["author"]) && !empty($_POST["price"]) && !empty($_POST["description"]) && !empty($_FILES["cover_img"])) {
            $booksClass->newBook(
                $_POST["book"],
                $_POST["category"],
                $_POST["author"],
                $_POST["price"],
                $_POST["description"],
                $_FILES["cover_img"]["tmp_name"]
            );
        }
        
        header("Location: ../index.php");
    }
?>