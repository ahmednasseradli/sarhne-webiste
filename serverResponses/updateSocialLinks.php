<?php   

    session_start();
    include "../incs/app.classes.php";

    if(isset($_SESSION["username"])) {

        $username       = $_SESSION["username"];
        $facebook       = $_GET["facebook"] ?? "";
        $instagram      = $_GET["instagram"] ?? "";
        $twitter        = $_GET["twitter"] ?? "";
        $snapchat       = $_GET["snapchat"] ?? "";
        $youtube        = $_GET["youtube"] ?? "";
        $whatsapp       = $_GET["whatsapp"] ?? "";
        $tiktok         = $_GET["tiktok"] ?? "";
        $gmail          = $_GET["gmail"] ?? "";
        $socialErrors   = [];

        if(!empty($facebook) && stripos($facebook, "facebook.com") === false) {

            $socialErrors[] = "رابط الفيسبوك غير صالح";
        }
        if(!empty($instagram) && stripos($instagram, "instagram.com") === false) {

            $socialErrors[] = "رابط الانستجرام غير صالح";
        }
        if(!empty($twitter) && stripos($twitter, "twitter.com") === false) {

            $socialErrors[] = "رابط تويتر غير صالح";
        }
        if(!empty($snapchat) && stripos($snapchat, "snapchat.com") === false) {

            $socialErrors[] = "رابط سناب شات غير صالح";
        }
        if(!empty($youtube) && stripos($youtube, "youtube.com") === false) {

            $socialErrors[] = "رابط اليوتيوب غير صالح";
        }
        if(!empty($tiktok) && stripos($tiktok, "tiktok.com") === false) {

            $socialErrors[] = "رابط التيك توك غير صالح";
        }
        if(!empty($whatsapp) && mb_strlen($whatsapp) < 9) {

            $socialErrors[] = "رقم الهاتف غير صحيح";
        }

        if(empty($socialErrors)) {

            $user->updateSocialLinks($username, $facebook, $instagram, $twitter, $snapchat, $youtube, $whatsapp, $tiktok, $gmail);
            echo "done";

        } else {

            foreach ($socialErrors as $err) {

                echo "<div class='alert alert-danger' role='alert'>";
                    echo $err;
                echo "</div>"; 
            }
        }


    } else {

        header("location:../login.php");
    }