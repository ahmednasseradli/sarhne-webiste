<?php 

    session_start();
    $pageTitle  = "التعليمات";
    include "./incs/header.php";
    if (isset($_SESSION["username"])) {
        include "./incs/user-navbar.php";
    } else {
        include "./incs/navbar.php";
    }
    ?>

    <div class="instructs-page">
        <div class="container">
            <span><i class="fa fa-circle-info"></i></span>
            <h2>التعليمات والمساعدة</h2>
            <div class="instructs-box">
                <div class="instruction">
                    <div class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#what-is-saraha" aria-expanded="false" aria-controls="what-is-saraha">
                        ماهو موقع صارحني       
                    </div>
                    <div class="collapse" id="what-is-saraha">
                        <div class="card card-body">
                            بخطوة واحدة، أنت على موعد مع الحقيقة أحصل على رسائل سرية من زملائك بصراحة إعرف مزاياك و عيوبك، وما يعتقده الناس عنك عزز شخصيتك بمعرفة الواقع بعيدا عن النفاق ادخل في حوارات مباشرة مع أصدقاءك بسرية واجه الصراحة التي أخفتها عنك المجاملات 
                        </div>
                    </div>
                </div>
                <div class="instruction">
                    <div class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#how-to-signup" aria-expanded="false" aria-controls="how-to-signup">
                    كيف انشئ حساب 
                    </div>
                    <div class="collapse" id="how-to-signup">
                        <div class="card card-body">
                        يمكنك تسجيل حساب عبر بريدك الإلكتروني او الحسابات الإجتماعية بسهولة 
                        </div>
                    </div>
                </div>
                <div class="instruction">
                    <div class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#forget-password" aria-expanded="false" aria-controls="forget-password">
                    نسيت كلمة المرور
                    </div>
                    <div class="collapse" id="forget-password">
                        <div class="card card-body">
                        من خلال صفحة تسجيل الدخول أضغط على نسيت كلمة المرور ادخل بريدك الألكتروني وسنرسل لك رابط اعادة تعين كلمة السر , ملاحظة اذا كنت مسجل بواسطة الشبكات الاجتماعية فقط انقر على دخول بواسطة جوجل او فيس بوك 
                        </div>
                    </div>
                </div>
                <div class="instruction">
                    <div class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#get-messages" aria-expanded="false" aria-controls="get-messages">
                    كيف احصل على مصارحات
                    </div>
                    <div class="collapse" id="get-messages">
                        <div class="card card-body">
                            بعد انشاء الحساب ستحصل على الرابط الخاص بك عند حصولك على الرابط الخاص بك يمكنك نشره عبر مواقع التواصل الإجتماعي لتحصل على ملاحظات دون ان تعرف المصدر    
                        </div>
                    </div>
                </div>
                <div class="instruction">
                    <div class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#bothering" aria-expanded="false" aria-controls="bothering">
                    وصلتني مصارحة مزعجة 
                    </div>
                    <div class="collapse" id="bothering">
                        <div class="card card-body">
                            المعذرة لن نكون قادرين على معرفة من المرسل لان نظام عمل الموقع الحصول على مصاراحات مجهولة تستطيع من الأعدادت الحساب تفعيل ميزة فلترة المصاراحات التي تحتوى على كلام سيء ولن نكون قادرين على فلترة جميع الكلمات
                        </div>
                    </div>
                </div>
                <div class="instruction">
                    <div class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#report-user" aria-expanded="false" aria-controls="report-user">
                    الأبلاغ عن مستخدم 
                    </div>
                    <div class="collapse" id="report-user">
                        <div class="card card-body">
                        في حال وجدت مستخدم ينتهك معاير وشروط موقع صارحني من فضلك ارسل لنا بلاغ عن هذا المستخدم من خلال صفحته الشخصية ستجد زر ابلاغ عن اساءة والفريق المختص سيراجع الابلاغ ويتخذ الأجراء المطلوب
                        </div>
                    </div>
                </div>
                <div class="instruction">
                    <div class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#call-saraha" aria-expanded="false" aria-controls="call-saraha">
                    ارغب بالأتصال بأدارة صارحني 
                    </div>
                    <div class="collapse" id="call-saraha">
                        <div class="card card-body">
                        يمكنك التواصل معنا بشكل مباشر من خلال ازرار شبكات التواصل الموجودة اسفل كل صفحة
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include "./incs/footer.php";
