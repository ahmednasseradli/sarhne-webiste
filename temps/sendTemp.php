<div class="send-page">
    <div class="container">
        <div class="sendmsg">
            <img id="user-img" src="./layout/imgs/users/<?=$user_img?>" height="100" width="100" alt="<?=$username?>">
            <h5 for="message">
                اكتب رسالة إلى 
                <?=$userFullName?> 
                دون أن يعرفك
            </h5>
            <p class="user-about">
                <?=$userAbout?>
            </p>
            <div class="py-3" style="color: #f15354;"> الزيارات : <?=$userVisits?> <i class="fa-solid fa-eye"></i> </div>
            <form >
                <div class="f-group">
                    <input type="hidden" name="userID" id="userID" value="<?=$username?>">
                    
                    <textarea id="message" name="message" placeholder="اكتب رسالتك هنا"></textarea>
                </div>
                <button class="btn btn-danger" type="submit" id="send-button">ارسال</button>
            </form>
            <div class="alert alert-info" role="alert" id="msg-info" style="display:none;"></div>
            
        </div>
        <div class='public-messages'>
                <h3 class="py-3">
                    الرسائل العامة
                </h3>     
                <?php

                $public_msgs   = $messages->getPublicMessages($username);

                if(!empty($public_msgs)) {

                    foreach ($public_msgs as $msg) {

                    // print_r($msg);
                    echo "<div class='col-xs p-3' style='text-align: justify;'>";
                        echo '<div class="container-xs">';
                            echo "<div class='row'>";
                                echo "<div class='col-2 text-center p-0'><img class='sender-img' src='./layout/imgs/site/unknown.jpg' height='50'></div>";
                                echo "<div class='msg-container col-10'>";
                                    echo "<div class='msg-date'>" . $msg["date"] . "</div>";
                                    echo "<div class='msg-content mb-4 p-2'>" . $msg["message"]. "</div>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo"</div>";
                    }
                } else {
                    
                echo "<div class='no-messages'> ";
                    echo "<i class='fa fa-paper-plane fa-4x py-3'></i><br/>لا توجد رسائل ومصارحات علنية ...";
                    echo "<p>
                        لايرغب 
                        <span style='color:#dc3545;'> {$userFullName} </span>
                        بعرض اي مصارحات للعامة
                        اي رسائل يقوم هذا المستخدم بضبطها متاحة للعامة ستظهر هنا</p>";
                echo "</div>";
                }
                  
               ?>
        </div>

        <div class="signup-now">
            <i class="fa fa-lightbulb fa-7x my-3"></i><br>
            <h3>حانت لحظة الصراحة</h3>
            <span>هل أنت مستعد لمعرفة ملاحظات الناس عنك بدون أن تعرفهم ؟</span>
            <p>
                أحصل على رسائل سرية من زملائك بصراحة
                إعرف مزاياك و عيوبك، وما يعتقده الناس عنك
                عزز شخصيتك بمعرفة الواقع بعيدا عن النفاق
                واجه الصراحة التي أخفتها عنك المجاملات
            </p>
            <a href="/saraha/sign-up" class="signup-now btn btn-primary">سجل الان</a>
        </div>     
    </div>

</div>