<?php
    session_start();
    include "../incs/app.classes.php";


    // Sending Message Response
    if (isset($_GET["msg"]) && !empty($_GET["msg"])) {
        
        $message    = $_GET["msg"];
        $receiver   = $_GET["user"];
        $sender     = $_SESSION["unique_id"];

        if (!empty($receiver) && !(strlen($receiver) < 5)) {
            // Creating Send Message Object
            $messages->sendMessage($message, $sender, $receiver);
            echo "تم ارسال رسالتك بنجاح";
        } else {
            echo "الرابط الذي اتبعته غير صحيح.";
        }
    } elseif (empty($_GET["msg"])) {

        echo "لا يمكنك ارسال رسالة فارغة.";
    }


    // // Making a message public
    // if (isset($_POST["userID"]) && !empty($_POST["userID"])) {

    //     if (isset($_POST["publicmsgID"]) && !empty($_POST["publicmsgID"])) {

    //         // checking that user exists
    //         if ($user->isUserExist($_SESSION["username"])) {

    //             $messages->makeMsgPublic();

    //         }
    //     }
    // }

    
