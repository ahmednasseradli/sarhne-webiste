<div class="settings-page">
    <div class="container">
        <!-- <div class="update-msg"  id="update-msg">
            <i class="fa fa-check-circle fa-4x" style="color: #dc3545;"></i>
            <h3 class="py-3">تم تحديث البيانات بنجاح</h3>
            <span class="close-msg"><i class="fa fa-xmark"></i></span>
        </div> -->
        <!-- User Info -->
        <div class="user-info">
            <div class="user-img">
                <img src="./layout/imgs/users/<?=$user_img?>" alt="<?=$username?>" height="100" width="100">
            </div>
            <div class="user-name p-2">
                <span><?=$user->getUserDetails($username)["name"]?></span>
            </div>   
        </div>
        <h2 class="py-3">تغيير المعلومات الشخصية</h2>
        <!-- Settings Controls -->
        <div class="controls">
            <div class="profile active" data-show="#profile-settings"><a href="#">الملف الشخصي</a></div>
            <div class="account " data-show="#account-settings"><a href="#">الحساب</a></div>
            <div class="profile-image" data-show="#image-settings"><a href="#">الصورة </a></div>
        </div>

        <div class="settings-container">
            
            <!-- Profile Block -->
            <div id="profile-settings">
                <div class="settings mb-3 py-3">
                    <h3 class="py-2 profile">
                        <i class="fa fa-gears"></i>
                        اعدادات الملف الشخصي
                    </h3>
                    <form class="form-group">
                        <input type="text" id="name" class="form-control my-3 py-3" placeholder="Username" value='<?=$name?>'>
                        <input type="text" id="email" class="form-control my-3 py-3" placeholder="ادخل بريدك الالكتروني" value="<?=$user_info["email"]?>">
                        <select name="gender" id="gender" class="form-control my-3 py-3" value="1">
                            <option value="none"  disabled hidden>اختار الجنس</option>
                            <option value="male" <?=$user->getGender($username, 'male')?>>ذكر</option>
                            <option value="female" <?=$user->getGender($username, 'female')?>>انثى</option>
                        </select>
                        <textarea class="form-control" name="about" id="about" cols="30" rows="10" placeholder="نبذة عني..."><?=$user_info["user_about"]?></textarea>
                        <span class="py-2">القليل من المعلومات عنك</span>
                        <!-- <button id="submit-profile" type="submit" class="form-control btn btn-primary submit-btn py-3">حفظ التغييرات</button> -->
                        <input type="submit" id="submit-profile" class="form-control btn btn-primary submit-btn py-3" value="حفظ التغييرات">
                    </form>
                </div>
            </div>

            <!-- Account Block -->
            <div id="account-settings">

                <div class="settings mb-3 ">
                    <h3 class="py-2 change-password">
                        <i class="fa fa-lock"></i>
                        تغيير كلمة المرور   
                    </h3>
                    <div id="password-errors">
                        <!-- Errors go here -->
                    </div>
                    <form class="form-group">
                        <input type="password" id="new-pass" class="form-control my-3 py-3" placeholder="كلمة المرور الجديدة" name="new_pass">
                        <input type="password" id="re-pass" class="form-control my-3 py-3" placeholder="تأكيد كلمة المرور" name="re_pass">
                        <input type="submit" id="submit-pass" class="form-control btn btn-primary submit-btn py-3" value="حفظ التغييرات">
                    </form>
                </div>

                <div class="social-links settings my-3">
                    <h3 class="py-2">
                        <i class="fa fa-link"></i>
                        روابط التواصل الأجتماعي
                    </h3>
                    <div id="social-errors">
                        <!-- Errors go here -->
                    </div>
                    <form action="">
                        <div class="form-group">
                            <input type="text" id="facebook" class="form-control facebook my-3 py-3" placeholder="ادخل رابط الفيسبوك" value="<?=$sLinks['facebook']?>">
                            <input type="text" id="instagram" class="form-control instagram my-3 py-3" placeholder="ادخل رابط الانستجرام" value="<?=$sLinks['instagram']?>">
                            <input type="text" id="twitter" class="form-control twitter my-3 py-3" placeholder="ادخل رابط تويتر" value="<?=$sLinks['twitter']?>">
                            <input type="text" id="snapchat" class="form-control snapchat my-3 py-3" placeholder="ادخل رابط سناب شات" value="<?=$sLinks['snapchat']?>">
                            <input type="text" id="youtube" class="form-control youtube my-3 py-3" placeholder="ادخل رابط اليوتيوب" value="<?=$sLinks['youtube']?>">
                            <input type="tel"  id="whatsapp" class="form-control whatsapp my-3 py-3" placeholder="رقم الهاتف مسبوقا بكود دولتك" value="<?=$sLinks['whatsapp']?>">
                            <input type="text" id="tiktok" class="form-control tiktok my-3 py-3" placeholder="ادخل رابط تيك توك" value="<?=$sLinks['tiktok']?>">
                            <input type="email" id="gmail" class="form-control gmail my-3 py-3" placeholder="بريد اليكتروني" value="<?=$sLinks['gmail']?>">
                        </div>
                        <input type="submit" id="submit-links" class="form-control btn btn-primary submit-btn py-3" value="حفظ التغييرات" >
                    </form>
                </div>
            </div>

            <!-- Change Image Block -->

            <div id="image-settings">
                <div class="settings mb-3">
                    <h3 class="py-2 change-password">
                        <i class="fa fa-image"></i>
                        تغيير الصورة الشخصية   
                    </h3>
                    <div class="user-img text-center my-5">
                        <img src="./layout/imgs/users/<?=$user_img?>" alt="<?=$username?>" height="200" width="200">
                    </div>
                    <form action="./serverResponses/updateImage.php" class="form-group" method="POST" enctype="multipart/form-data">
                        <input type="file" id="user-image" class="form-control my-3 py-3" name="update-img" accept="image/*" >
                        <input type="submit" id="submit-image" class="form-control btn btn-primary submit-btn py-3" value="حفظ التغييرات" disabled>
                    </form>

                </div>  
            </div>
        </div>
    </div>
</div>




