<?php 
    session_start();
    $pageTitle  = "الرئيسية";
    include "./incs/app.classes.php";
    include "./incs/header.php";
    include "./incs/user-navbar.php";

   
   if (isset($_SESSION["username"])) { 
      $username   = $_SESSION["username"];
      $user_img   = $user->getUserDetails($username)["user_img"] ? $user->getUserDetails($username)["user_img"] : "user.jpg";
      $user_id    = $user->getUserDetails($username)["id"];
      $msgs   = $messages->getMessages($username);
      ?>

      <div class="messages-page">
         <div class="container">
            <!-- User Information -->
            <div class="user-info">
               <div class="user-img">
                  <img src="./layout/imgs/users/<?=$user_img?>" alt="<?=$username?>" height="100"  width="100">
               </div>
               <div class="user-name p-2">
                  <span><?=$user->getUserDetails($username)["name"]?></span>
               </div>
               <div class="user-link p-2">
                  <div class="link py-1" id="link"><?="http://localhost/saraha/" . $username;?></div>
                  <div class="share-link-msg">شارك الرابط وابدأ بتلقي الرسائل والصراحات</div>
               </div>
               <div class="share-buttons p-2">
                  <button id="copy-btn" class="btn btn-success" onclick="copyToClipboard()"><i class="fa fa-copy" ></i> نسخ</button>
                  <div class="btn btn-success"><i class="fa fa-share"></i> مشاركة</div>
                  <div class="btn btn-success"><a href="/saraha/instructs"><i class="fa fa-circle-question"></i> تعليمات</a></div>
               </div>
               
            </div>
            <!-- Messages -->
            <div class='msg-count py-3' > عدد الرسائل: <?=$messages->countMessages($username)?> <i class="fa fa-message"></i></div>
            <div class="messages-container">
               <div class="row">
                  <?php
                  
                  if(!empty($msgs)) {

                     foreach ($msgs as $msg) {
                           
                        echo "<div class='col-xs p-3 msg_" . $msg["msg_id"] . "' style='text-align: justify;'>";
                           echo '<div class="container-xs">';
                              echo "<div class='row'>";
                                 echo "<div class='col-2 text-center p-0'><img class='sender-img' src='./layout/imgs/site/unknown.jpg' height='50'></div>";
                                 echo "<div class='msg-container col-10'>";
                                    echo "<div class='msg-date'>" . $msg["date"] . "</div>";
                                    echo "<input type='hidden' name='message_id' class='message_id' value='". $msg["msg_id"] ."'>";
                                    echo "<input type='hidden' name='user_id' class='user_id' value='". $user_id ."'>";
                                    echo "<div class='msg-content mb-4 p-2'>" . $msg["message"]. "</div>";
                                    echo "<div class='msg-controls'>";
                                       if ($msg["msg_public"] == 0) {
                                          echo "<button class='btn msg-show msg-action'>" . "اظهار" . " <i class='fa fa-globe'></i></button>";
                                       } else {
                                          echo "<button class='btn msg-hide msg-action'>" . "اخفاء" . " <i class='fa fa-eye-slash'></i></button>";
                                       }
                                       echo "<button class='btn msg-delete msg-action'>" . "حذف" . " <i class='fa fa-trash'></i></button>";
                                    echo "</div>";
                                 echo "</div>";
                              echo "</div>";
                           echo "</div>";
                        echo"</div>";
                     }
                  } else {
                     
                     echo "<div class='no-messages'> ";
                        echo "<i class='fa-solid fa-envelope-open fa-2xl'></i><br/>لا يوجد رسائل";
                        echo "<p>شارك الرابط الخاص بك مع أصدقائك لتحصل على المصارحات</p>";
                     echo "</div>";
                  }
                  
                  ?>
               </div>
            </div>
            
         </div>
      </div>

   <?php 
   } else {
      header("location:/saraha/login.php");
   }





    include "./incs/footer.php";