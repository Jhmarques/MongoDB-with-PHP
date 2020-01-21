<?php
    $status = (isset($_POST["admin"])) ? "admin" : "notadmin";
    if(isset($_POST["login"])) {
        $username = $userClass->checkInput($_POST["username"]);
        $password = $userClass->checkInput($_POST["password"]);
    
        if(empty($username) || empty($password)) {
            echo "<script>
                $(document).ready(function() {
                    $('#loginError').modal('show');
                });
            </script>";
        }
        else {
            switch($status) {
                case "admin":
                    $userClass->checkAdmin($username, $password);
                    break;
                case "notadmin":
                    $userClass->login($username, $password);
                    break;
                default:
                    "";
                    break;
            }
        }
    }
?>