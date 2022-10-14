<div class="signup-page">

    <div class="container">
        <div class="text-center py-2">
            <img src="./layout/imgs/site/logo.jpg" alt="Saraha Logo" height="100">
            <h1 style="color: #f15354; font-weight:bold;">صارحني تسجيل حساب</h1>
        </div>
        <!-- Direct signup Links -->
        <div class="direct-signup">
            <h3>تسجيل مباشر</h3>
            <div class="facebook-signup">
                <div class="btn btn-primary">
                    تسجيل حساب باستخدام فيسبوك
                    <i class="fa-brands fa-facebook"></i>
                </div>
            </div>
            <div class="google-signup">
                <div class="btn btn-danger">
                    تسجيل حساب باستخدام جوجل
                    <i class="fa-brands fa-google"></i>
                </div>
            </div>
        </div>
        <!-- signup Form -->
        <div class="signup-form" >
            <form class="mb-3 signup" action="<?=$_SERVER["PHP_SELF"]?>" method="POST" >
                <h3 class="text-center pb-3">تسجيل حساب</h3>
                <?php
                if (isset($errors)) {

                    foreach ($errors as $error) {
                        
                        echo "<div class='alert alert-danger' role='alert'>";
                            echo $error;
                        echo "</div>";
                    }
                }
                ?>
                <div class="mb-3">
                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" required placeholder="الاسم كاملا ">
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" autocomplete="off" required placeholder="البريد الالكتروني ">
                </div>
                
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name='password' required required placeholder="كلمة السر">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="re-password" name='re-password' placeholder="تأكيد كلمة السر">
                </div>
                <div class="mb-3">
                    <select name="gender" id="gender" class="form-control my-3 py-3">
                        <option value="none"  disabled hidden selected>اختار الجنس</option>
                        <option value="male" >ذكر</option>
                        <option value="female" >انثى</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="username" name='username' required placeholder="اختر اسم مستخدم خاص بك حروف وارقام" autocomplete="off">
                </div>
                <div id="username-preview" class="mb-3" style="color: #f15354;text-align:left !important;">
                    https://www.saraha.com/<span style="color: #ffffff;">username</span>
                </div>
                <p>
                    بالضغط على تسجيل الدخول لـ صارحني فأنك توافق على 
                    <a class="use-rules" href="/saraha/privacy-terms.php">شروط الأستخدام</a>
                    و
                    <a class="privacy-policy" href="/saraha/privacy.php">سياسة الخصوصية.</a>
                </p>
                <div class="py-3">
                    <input type="checkbox" aria-label="Checkbox for following text input" name="accept-rules" required>
                    أقبل بالشروط والأحكام من خلال التسجيل
                </div>

                <button type="submit" class="btn btn-primary"> التسجيل</button>

                <div class="sign-up-now py-3">
                  لديك حساب ؟ 
                <a href="/saraha/login" style="color: #f15354;"> تسجيل الدخول </a>
                </div>
                <a class="py-3" href="#" style="color: #f15354;">هل نسيت كلمة السر؟</a>
            </form>
            
        </div>
    </div>
</div>