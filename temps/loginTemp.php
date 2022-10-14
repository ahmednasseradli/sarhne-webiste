<?php

    $googleLoginLink     = "https://accounts.google.com/o/oauth2/auth?response_type=code&access_type=online&client_id=183549698876-hp68ls2379ut2kmbu6pe15b4faun2u1r.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%2Fsaraha%2Fgoogle-login%2Fsignin.php&state&scope=email%20profile&approval_prompt=auto";

    ?>

<div class="login-page">

    <div class="container">
        <div class="text-center py-2">
            <img src="./layout/imgs/site/logo.jpg" alt="Saraha Logo" height="100">
            <h1 style="color: #f15354; font-weight:bold;">صارحني تسجيل الدخول</h1>
        </div>
        <!-- Direct Login Links -->
        <div class="direct-login">
            <h3>دخول مباشر</h3>
            <div class="facebook-login">
                <div class="btn btn-primary">
                    <a href="<?=$loginUrl?>">تسجيل الدخول باستخدام فيسبوك</a>
                    <i class="fa-brands fa-facebook"></i>
                </div>
            </div>
            <div class="google-login">
                <div class="btn btn-danger">
                    <a href="<?=$googleLoginLink?>">تسجيل الدخول باستخدام جوجل</a>
                    <i class="fa-brands fa-google"></i>
                </div>
            </div>
        </div>
        <!-- Login Form -->
        <div class="login-form">
            <?php
                if (isset($loginErr)) {

                    echo "<div class='alert alert-danger' role='alert'>";
                        echo $loginErr;
                    echo "</div>";
                }
            ?>
            <form class="mb-3 login" action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
                <h3 class="text-center">تسجيل الدخول</h3>
                <div class="mb-3">
                    <label for="username" class="form-label">اسم المستخدم</label>
                    <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">كلمة السر</label>
                    <input type="password" class="form-control" id="password" name='password' required>
                </div>
                <p>
                    بالضغط على تسجيل الدخول لـ صارحني فأنك توافق على 
                    <a class="use-rules" href="/sraraha/privacy-terms.php">شروط الأستخدام</a>
                    و
                    <a class="privacy-policy" href="/sraraha/privacy.php">سياسة الخصوصية.</a>
                </p>
                <button type="submit" class="btn btn-primary"> الدخول</button>

                <div class="sign-up-now py-3">
                ليس لديك حساب ؟
                <a href="/saraha/sign-up.php" style="color: #f15354;">سجل حسابك الآن</a>
                </div>
                <a class="py-3" href="#" style="color: #f15354;">هل نسيت كلمة السر؟</a>
            </form>
            
        </div>
    </div>
</div>