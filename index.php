<?php

    session_start();
    include "./incs/app.classes.php";
    include "./incs/header.php";
    echo '<div class="home">';
    include "./incs/navbar.php";
    echo '</div>';

?>


    <div class="background">
        <div class="overlay">
            <div class="home-info">
                <h1>صارحني بـ صراحه</h1>
                <p>هل أنت مستعد لمعرفة ملاحظات الناس عنك بدون أن تعرفهم؟</p>
                <div class="signin-up">
                    <div class="btn btn-success"><a href="/saraha/login" class="signin"><i class="fa fa-paper-plane"></i> دخول للحساب </a></div>
                    <div class="btn btn-primary"><a href="/saraha/sign-up" class="signup"><i class="fa fa-plus"></i> نسجيل حساب جديد</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Site Explanning -->
    <div class="explanning">
        <div class="container">
            <h2 class="my-5 text-center">شرح موقع بصراحة</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="media">
                        <img src="./layout/imgs/site/mail.svg" alt="media" >
                    </div>
                    <h5 class="pt-3">انشاء حساب صراحة</h5>
                    <p class="px-3">يمكنك تسجيل حساب عبر بريدك الإلكتروني او الحسابات الإجتماعية بسهولة</p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="media">
                        <img src="./layout/imgs/site/mobile-testing.svg" alt="media" >
                    </div>
                    <h5 class="pt-3">مشاركة رابط صراحة</h5>
                    <p class="px-3">عند حصولك على الرابط الخاص بك يمكنك نشره عبر مواقع التواصل الإجتماعي لتحصل على ملاحظات دون ان تعرف المصدر</p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="media">
                        <img src="./layout/imgs/site/chating.svg" alt="media" >
                    </div>
                    <h5 class="pt-3">صارحني رسائلي إقرأ ما كتبه الناس عنك </h5>
                    <p class="px-3">عند دخولك لحسابك ستجد كل الملاحظات التي قام بكتابها أصدقائك عنك ، أنت وحدك من يمكنه قرائتها</p>
                </div>
            </div>

        </div>
    
    </div>

    <!-- How To Use the site-->
    <div class="how-to-use">
        <div class="container">
            <h2 class="py-3">كيفية استخدام موقع صراحة</h2>
            <div class="row">
                <div class="col">
                    <div class="how-to-img">
                        <img src="./layout/imgs/site/how-to.png" alt="how to" height="300">
                    </div>
                    <p class="py-3">
                    يمكن اعتبار صراحة بسيطًا للغاية، فبمجرد التسجيل باستخدام اسم مستخدم وكلمة مرور ستتمكن من مشاركة رابط ملف التعريف الخاص بك على أي من مواقع التواصل الاجتماعي والطلب من الناس استخدام الرابط لتقديم تعليقاتهم لك. يمكن للأشخاص كتابة أي شيءٍ بشكلٍ مجهولٍ وسيتم تسليمه لك من خلال التطبيق أو الموقع
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- App Downloading Section -->
    <div class="app-download">
        <div class="container">
            <h2 class="py-3">تنزيل تطبيق صارحني صراحة</h2>
            <div class="row">
                <div class="col">
                    <div class="app-download-img py-2">
                        <img src="./layout/imgs/site/mobile-app.svg" alt="how to" height="200">
                    </div>
                    <p class="py-3">
                    تابع الرسائل التي تصل لحسابك لحظة بلحظة عبر تطيقاتنا للهاتف المحمول
                    </p>
                </div>
            </div>
            <!-- App Store to download -->
            <div class="download-stores pb-4">
                <div class="store-container">
                    <a href="#"><img src="./layout/imgs/site/google-play-img.png" alt="Google Play" width="200"></a>
                </div>
                <div class="store-container">
                    <a href="#"><img src="./layout/imgs/site/appgallery-img.png" alt="App Gallery" width="200"></a>
                </div>
                <div class="store-container">
                    <a href="#"><img src="./layout/imgs/site/iphone-store.png" alt="App Store" width="200"></a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- White space -->
    <div class="py-5" style="background-color: White;"></div>
   

<?php
    include "./incs/footer.php";
