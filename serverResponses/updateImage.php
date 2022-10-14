<?php
    session_start();
    include "../incs/app.classes.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username   = $_SESSION["username"];        
        $f_name     = $_SESSION["username"].".jpg";
        $f_type     = $_FILES["update-img"]["type"];
        $f_tmp      = $_FILES["update-img"]["tmp_name"];
        $f_exe      = explode("/", $f_type);
        $f_exe      = end($f_exe);
        $f_size     = $_FILES["update-img"]["size"];
        $valid_exes = array("png", "jpeg", "jpg");
        $f_location = "../layout/imgs/users/";
        
        // Checking that file uploaded exetension is an image exe.
        if (in_array($f_exe, $valid_exes)) {
            
            move_uploaded_file($f_tmp, $f_location.$f_name);
            $user->updateImage($username);
            header("location:".$_SERVER["HTTP_REFERER"]);
        } else {
            echo "not in array";
        }
    }