<?php
    session_start();
    include "../incs/app.classes.php";

    if (isset($_SESSION["username"])) {

        $username   = $_SESSION["username"];

        if (isset($_GET["type"]) && isset($_GET["uID"]) && isset($_GET["msgID"])) {

            if (!empty($_GET["uID"]) && !empty($_GET["msgID"])) {

                $userID    = $_GET["uID"];
                $msgID     = $_GET["msgID"];

                if ($_GET["type"] === "msg-show") {

                    $messages->showMsg($username, $userID, $msgID);
                    echo "public";
                }
    
                if ($_GET["type"] === "msg-hide") {
    
                    $messages->hideMsg($username, $userID, $msgID);
                    echo "private";

                }
    
                if ($_GET["type"] === "msg-delete") {
                    
                    $messages->deleteMsg($username, $userID, $msgID);
                    echo "deleted";
    
                }
            } else {

                header("location:../login.php");
            }
            
        } else {
            header("location:../login.php");
        }
    } else {

        header("location:../login.php");
    }