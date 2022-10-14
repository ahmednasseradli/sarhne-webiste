<?php

    session_start();
    $pageTitle  = "التسجيل";
    include "./incs/app.classes.php";
    include "./incs/header.php";
    include "./incs/navbar.php";

    // Ensuring that request is post method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name       = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
        $email      = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $username   = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $password   = $_POST["password"];
        $re_password= $_POST["re-password"];
        $gender     = $_POST["gender"];
        $hashedPass = sha1($password);
        $accept_rules = empty($_POST["accept-rules"])? 0: 1;
        $errors     = [];

        echo $gender;

        // Validating Data
        if (strlen($name) < 5) {

            $errors[] = "الاسم لا يجب ان يقل عن 5 أحرف";
        }
        if (empty($email)) {

            $errors[] = "برجاء ادخال بريد اليكتروني";
        }
        if (strlen($username) < 5) {
            $errors[] = "اسم المستخدم لا يجب ان يقل عن 5 أحرف";
        }
        if (strlen($password) < 6) {
            $errors[] = "كلمة المرور لا يجب ان تقل عن 6 أحرف";
            
        }
        if ($password !== $re_password) {
            $errors[] = "كلمة المرور غير متطابقة";
            
        }
        if ($user->isUserExist($username) > 0) {

            $errors[] = "اسم المستخدم هذا غير متاح";
        }
        if ($accept_rules == 0) {

            $errors[] = "برجاء الموافقة على شروط الاستخدام وسياسة الخصوصية للتسجيل";
        }

        if (empty($errors)) {

            $user->addNewUser($name, $email, $hashedPass, $username, $gender, null);
            // $user->addNewUser($name, $email, $hashedpass, $username, $gender, $img);

            $_SESSION["username"]   = $username;
            $user->setSocialLinks($username);
            header("location:./messages");
                            
        }
    }
    

    include "./temps/signupTemp.php";

    include "./incs/footer.php";