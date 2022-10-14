<?php
    session_start();
    include "./incs/app.classes.php";
    include "./incs/header.php";
    include "./incs/user-navbar.php";
    
    // echo "User Profile";
    if (isset($_SESSION["username"])) {
        $username       = $_SESSION["username"];
        $user_info      = $user->getUserDetails($username); // Assigning all user info to a variable $user_info
        $name           = $user_info["name"];
        $user_img       = $user_info["user_img"] ? $user_info["user_img"] : "user.jpg"; // Making sure that $user_img has always valid value
        $sLinks         = $user->getSocialLinks($username); // Assigning all user links to a variable $sLinks
        include "./temps/settingsTemp.php";
    } else {
        header("location:./index.php");
    }
    
    include "./incs/footer.php";