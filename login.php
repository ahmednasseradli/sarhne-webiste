<?php 
    session_start();
    $pageTitle  = "تسجيل الدخول";
    include "./incs/app.classes.php";
    include "./incs/header.php";
    include "./incs/navbar.php";
    // include "./fb-login/login.php";

    ########################################
    include './fb-login/vendor/autoload.php';
    
    $fb = new Facebook\Facebook([
    'app_id' => '1098910654380463',
    'app_secret' => '19ab1c07a21fc0ecd06aba03606b9dae',
    'default_graph_version' => 'v14.0',
    ]);

    $helper = $fb->getRedirectLoginHelper();
    $permissions = ['email', "user_gender", ]; // optional
    $loginUrl = $helper->getLoginUrl('http://localhost/saraha/fb-login/fb-callback.php', $permissions);


    if(!isset($_SESSION["unique_id"])) {
        $uniqueID   = $unique_ID->createUniqueID();
        $_SESSION["unique_id"] = $uniqueID;
        // $unique_ID->addUniqueIDtoDB();
    }
    ########################################

    // Login Validating
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username       = $_POST["username"];
        $password       = $_POST["password"];
        $validateStatus = $user->loginValidate($username, $password);
        if ($validateStatus) {
            $_SESSION["username"] = $username;
            header("location:/saraha/my-profile");
        } else {
            $loginErr = "اسم المستخدم او كلمة المرور خاطئة.";
        }
    }

    if (!isset($_SESSION["username"])) {
    
        include "./temps/loginTemp.php";
    } else {
        header("location:/saraha/messages");
    }

    include "./incs/footer.php";
