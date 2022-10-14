<?php
    session_start();
    include "../incs/app.classes.php";

    if (isset($_SESSION["username"])){

        if (isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["gender"]) && isset($_GET["about"])) {

            $username   = $_SESSION["username"];
            $name       = filter_var($_GET["name"], FILTER_SANITIZE_STRING);
            $email      = filter_var($_GET["email"], FILTER_SANITIZE_EMAIL);
            $gender     = $_GET["gender"];
            $about      = filter_var($_GET["about"], FILTER_SANITIZE_STRING);
            $errors     = [];

            if (empty($name)) {
                // $errors[]   = "لا يمكن ترك الاسم فارغا";
                $name       = $user->getUserDetails($username)["name"];
            }
            if (mb_strlen($name) < 6) {
                $errors[]   = "الاسم لا يجب ان يقل عن 6 احرف";
            }
            
            if (empty($errors)) {

                $user->updateProfile($username, $name, $email, $gender, $about);
                echo "done";

            }
            
            if (!empty($errors)) {

                foreach ($errors as $error) {

                    echo $error;
                }
            }

        } else {
            echo "nothing";
        }

    } else {

        header("location:../login.php");
    }