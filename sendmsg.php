<?php

    session_start();
    include "./incs/app.classes.php";
    include "./incs/header.php";
    include "./incs/navbar.php";
    
    if (!isset($_SESSION["unique_id"])) {

        $_SESSION['unique_id']  = $unique_ID->createUniqueID();

    }

    if(isset($_GET["user"]) && !empty($_GET["user"])) {
        $username = $_GET["user"];
        if ($user->isUserExist($username) > 0) { // Checking that username is in database
            $user->increaseVisits($username); // Icreasing user visits
            $userDetails            = $user->getUserDetails($username); // Getting user data from database
            $userFullName           = $userDetails['name'];
            $userAbout              = $userDetails['user_about'];
            $userImg                = $userDetails['user_img'];
            $userVisits             = $userDetails['visits'];
            $user_img = $userImg  ? $userImg  : "user.jpg";
            
            include "./temps/sendTemp.php";
                        
        } else {
            header("location:/saraha");
        }
        

    } else {
        header("location:/saraha");
    }

    // echo "<pre>";
    // echo var_dump();
    // echo "</pre>";


    include "./incs/footer.php";