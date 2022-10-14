<?php
    session_start();
    include "../incs/app.classes.php";

    if (isset($_SESSION["username"]) && $_SERVER["REQUEST_METHOD"] == "GET") {

        if (isset($_GET["new-pass"]) && isset($_GET["re-pass"]) && !empty($_GET["new-pass"]) && !empty($_GET["re-pass"])) {

            $username   = $_SESSION["username"];
            $new_pass   = $_GET["new-pass"];
            $re_pass    = $_GET["re-pass"];
            $errors     = [];
            
            if (strlen($new_pass) < 6) {
                $errors[]   = "كلمة السر لا يجب ان تقل عن 6 احرف";
            }
            if ($new_pass !== $re_pass) {
                
                $errors[]   = "كلمة السر غير متطابقة";
            }
            
            if (empty($errors)) {
                
                $user->updatePass($username, $new_pass);
                echo "done";
                
            } 

            if(!empty($errors)) {

                foreach($errors as $error) {

                    echo "<div class='alert alert-danger' role='alert'>";
                        echo $error;
                    echo "</div>"; 
                }
            }

        }

    } else {
        header("location:./login");
    }