<div class="settings-page">
        <div class="container">
            <div class="user-info">
                <div class="user-img">
                    <img src="./layout/imgs/users/<?=$user_img?>" alt="<?=$username?>" height="100">
                </div>
                <div class="user-name p-2">
                    <span><?=$user->getUserDetails($username)["name"]?></span>
                </div>   
            </div>
            <h2 class="py-3">تغيير المعلومات الشخصية</h2>
            <!-- Settings Controls -->
            <div class="controls">
                <div class="profile active"><a href="./settings?tab=profile">الملف الشخصي</a></div>
                <div class="account "><a href="./settings?tab=account">الحساب</a></div>
                <div class="profile-image"><a href="./settings?tab=photo">الصورة </a></div>
            </div>
        
        <?php
        if (isset($_GET["tab"])) {
            
           if ($_GET["tab"]  == "profile") {

                include "./temps/profileTemp.php";

           } elseif ($_GET["tab"]  == "photo") {
            
                include "./temps/changePhotoTemp.php";

           } elseif ($_GET["tab"]  == "account") {
            
                include "./temps/accountTemp.php";
           } else {
            
            include "./temps/accountTemp.php";
            }
        } else {
            header("location:/saraha/");
        }
?>
        </div>
    </div>
    
