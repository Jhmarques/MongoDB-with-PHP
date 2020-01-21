<?php
    if(isset($_POST["register"])) {
        $username = $userClass->checkInput($_POST["username"]);
        $password = $userClass->checkInput($_POST["password"]);
        $email = $userClass->checkInput($_POST["email"]);
    }

    if(empty($username) || empty($password) || empty($email)) {
        $error = true;
    }
    else {
        $userClass->register($username, $password, $email);
        unset($error);
    }

    if(isset($error) && isset($_POST["register"])) {
        echo "<script>
            $(document).ready(function() {
                $('#errorModal').modal('show');
            });
        </script>";
    }
?>