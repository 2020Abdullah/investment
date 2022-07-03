@extends('layout.master')

@section('title')
    الرئيسية
@endsection

@section('content')

<!-- banner-section -->
<section id="banner" class="banner" style="padding-bottom: 253.5px; padding-top: 241px;">
    <div class="container">
        <div class="row justify-content-xl-between justify-content-lg-between justify-content-md-center justify-content-sm-center">
            <div class="col-xl-7 col-lg-7 col-sm-10 col-md-9 d-xl-flex d-lg-flex d-block align-items-center d-banner-tamim">
                <div class="banner-content">
                    <h4>هل تريد استثمار اموالك ؟</h4>
                    <h1>استثمارك بقي اونلاين
                        وتستلم ارباحك يوميا وانت في البيت
                        بدون حد ادني للاستثمار</h1>
                    <p>لقد أكملنا بالفعل أكثر من 50 عامًا في مجال الاستثمار عبر الإنترنت مع الثقة والسمعة الممتازة.</p>
                    <a href="{{route('register')}}" class="btn-hyipox">ابدا استثمارك الان</a>
                </div>
                <div class="banner-statics">
                    <div class="single-statics">
                        <div class="part-icon">
                            <img src="assets/img/svg/start.svg" alt="">
                        </div>
                        <div class="part-text">
                            <span class="text">تاريخ البدء ( اونلاين )</span>
                            <span class="number">25 يونيو 2022 </span>
                        </div>
                    </div>
                    <div class="single-statics">
                        <div class="part-icon">
                            <img src="assets/img/svg/user.svg" alt="">
                        </div>
                        <div class="part-text">
                            <span class="text">مستخدمون نشطون الان</span>
                            <span class="number">175+</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-sm-10 col-md-8 monitor-for-480">
                <div class="profit-calculator">
                    <div class="calc-header">
                        <h3 class="title">احسب  <span class="special"> ارباحك</span></h3>
                    </div>
                    <div class="calc-body">
                        <div class="part-plan">
                            <h4 class="title">
                                اختر خطة الاستثمار
                            </h4>
                            <div class="dropdown show" id="plans-list">
                                <select class="form-control displayed-selected-plan">
                                    <option>اختر باقتك</option>
                                    @foreach ($packages as $pack)
                                        <option data-days="{{$pack->packege_time * 30}}" data-rate="{{$pack->packege_rate}}">{{$pack->packege_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="part-amount">
                            <h4 class="title">
                                أدخل المبلغ
                            </h4>
                            <form>
                                <span class="currency-symbol" id="basic-addon1">$</span>
                                <input type="text" class="inputted-amount">
                                    <button class="dropdown-toggle displayed-selected-currency" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        USD
                                    </button>
                                    <div class="dropdown-menu currency-select-list" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item single-currency-select selected-currency active" href="#" data-currency="usd">USD</a>
                                        <a class="dropdown-item single-currency-select" href="#" data-currency="eur">EUR</a>
                                        <a class="dropdown-item single-currency-select" href="#" data-currency="btc">BTC</a>
                                        <a class="dropdown-item single-currency-select" href="#" data-currency="eth">ETH</a>
                                    </div>
                            </form>
                        </div>
                        <div class="d-inline-block cursor-not-allowed">
                            <button class="calculate-all">احسب</button>
                        </div>
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="part-result">
                        <ul>
                            <li>
                                <div class="icon">
                                    <img src="assets/img/svg/business-and-finance.svg" alt="">
                                </div>
                                <div class="text">
                                    <span class="title"> إجمالي المبلغ المستحق <br/> في نهاية الفترة</span>
                                    <span class="number js_totalPercentage">$0</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/img/svg/profit.svg" alt="">
                                </div>
                                <div class="text">
                                    <span class="title">الأرباح اليومية</span>
                                <span class="number js_dailyProfit">$0</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/img/svg/profits.svg" alt="">
                                </div>
                                <div class="text">
                                    <span class="title"> الربح <br>  صافي </span>
                                <span class="number js_netProfit">$0</span>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/img/svg/return-on-investment.svg" alt="">
                                </div>
                                <div class="text">
                                    <span class="title">المبلغ المسترد في نهاية الفترة</span>
                                    <span class="number js_totalReturn">$0</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner-section -->

<!-- feature-section -->
<section class="feature" id="feature">
    <div class="container">
        <div class="how-to-works" style="margin-top: -103.5px;">
            <div class="row justify-content-center justify-content-sm-center justify-content-md-start">
                <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6">
                    <div class="single-system">
                        <div class="part-icon">
                            <img src="assets/img/svg/add-user.svg" alt="">
                        </div>
                        <div class="part-text">
                            <h4 class="title">انشاء حساب</h4>
                            <p>سجل للحصول على حساب. إنه سهل ومجاني تمامًا</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6">
                    <div class="single-system">
                        <div class="part-icon">
                            <img src="assets/img/svg/coin.svg" alt="">
                        </div>
                        <div class="part-text">
                            <h4 class="title">الايداع وبدئ الاستثمار</h4>
                            <p>اختر خطتك الاستثمارية وقم بعمل إيداعك بشكل شخصي مباشر لتحقيق اعلي مستويات الامان</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6">
                    <div class="single-system">
                        <div class="part-icon">
                            <img src="assets/img/svg/money-bag.svg" alt="">
                        </div>
                        <div class="part-text">
                            <h4 class="title">استلام الارباح</h4>
                            <p>تستطيع استلام مسحوباتك خلال 24 ساعة كاقصي حد مع اقوي نظام امن وتشفير المدفوعات لحماية اموالك</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-center">
            <div class="col-xl-6 col-lg-6 col-sm-10">
                <div class="part-text">
                    <h2><span class="special">المكان المناسب لك</span> لإستثمار الأموال باعلي عائد</h2>
                    <p><span class="spc">و باقل وقت و باقوي معايير الامان</span>.</p>
                    <ul>
                        <li><i class="fas fa-check"></i> نظام امان قوي EV_SSL</li>
                        <li><i class="fas fa-check"></i> خدمة عملاء علي مدار  24/7 Sections </li>
                        <li><i class="fas fa-check"></i>سرعة اداء عالية تتيح لك تصحيل اكبر عائد في اقل وقت </li>
                        <li><i class="fas fa-check"></i> وجود متخصصين يعملون في الفوركس والاوبشن والكريبتو، وبشكل اساسي هو الفوركس.</li>
                    </ul>
                    <p>تتكون الشركه من رئيس مجلس الإداره , وفريق التدوال الذي ينقسم الي ثلاثه اقسام، وفريق الدعم الذي يعمل علي مدار اليوم، وفريق الطوارئ، والفريق التقني</p>
                    <a href="{{route('register')}}" class="btn-hyipox-2">ابدا استثمارك الان</a>
                </div>
                <div class="video">
                    <video style="width:100%" height="350" controls>
                        <source src="{{asset('assets/video/about.mp4')}}" type="video/mp4">
                        <source src="{{asset('assets/video/about.mp4')}}" type="video/ogg">
                      Your browser does not support the video tag.
                      </video>
                </div>
            </div>
            <div class="col-xl-5 col-lg-6 col-sm-10 col-md-12">
                <div class="part-about">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-6">
                            <div class="single-about">
                                <div class="about-icon">
                                    <img src="assets/img/svg/solar-energy.svg" alt="">
                                </div>
                                <div class="about-text">
                                    <h3>سرعة اداء عالية بدون مخاطرة</h3>
                                    <p>الشركه تعمل في الفوركس والاوبشن والكريبتو،
                                        الاساسي هو الفوركس والاعتماد فيه يكون علي الذهب بنسبه 55٪ وذلك بسبب ضمان وجوده،وبسبب حركته السريعه. ويليه الكريبتو بنسبه 30٪ ويليهم الاوبشن بنسبه 15٪ وكل قسم له فريقه الخاص من اجل القيام بافضل الارباح وتقديم اعظم النتائج دون ادني احتمال للخساره </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-6">
                            <div class="single-about">
                                <div class="about-icon">
                                    <img src="assets/img/svg/diploma.svg" alt="">
                                </div>
                                <div class="about-text">
                                    <h3>نحن معتمدون</h3>
                                    <p>تاكد من انك تتعامل مع شركة معتمدة لديها كامل التوثيقات القانونية وتعمل في هذا المجال منذ زمن طويل ولديها من الخبرة ما يكفي لادارة اموالك بشكل احترافي في اسواق الذهب والفوركس وتحقيق اقصي ربح ممكن بدون الحاجة للخوف علي خسارة اموالك في اي وقت </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-6">
                            <div class="single-about">
                                <div class="about-icon">
                                    <img src="assets/img/svg/blockchain.svg" alt="">
                                </div>
                                <div class="about-text">
                                    <h3>نحن ندعم التشفير</h3>
                                    <p>نقوم بتشفير الاموال في كلا من الايداع او السحب وذلك لتحقيق اعلي معيير الامان للاموال و التي نعتمد فيها علي EV_SSL  وهي شهادة التحقق من الصحة الموسعة هي شهادة مطابقة لـ X.509 تثبت الكيان القانوني للمالك ويتم توقيعه بواسطة مفتاح سلطة الشهادة الذي يمكنه إصدار شهادات EV. يمكن استخدام شهادات EV بنفس طريقة استخدام أي شهادات X.509 الأخرى ، بما في ذلك تأمين اتصالات الويب باستخدام HTTPS وتوقيع البرامج والمستندات.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-sm-12 col-md-6">
                            <div class="single-about">
                                <div class="about-icon">
                                    <img src="assets/img/svg/worldwide.svg" alt="">
                                </div>
                                <div class="about-text">
                                    <h3>نحن عالميون</h3>
                                    <p>لا يهمنا من اي بلد كنت تستطيع المشاركة والاستثمار من اي مكان في هذا العالم الجميل وفي حال احتجت اي مساعدة لا تتردد في التواصل معنا وسيقوم المختص بطلبك بالتواصل معك فورا وتقديم كامل الدعم والمساعدة الممكنة . </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End feature-section -->

<!-- statics-section -->
<section class="statics" id="statics">
    <div class="container">
        <div class="all-statics">
            <div class="row no-gutters justify-content-center">
                <div class="col-xl-4 col-lg-3 col-sm-10 col-md-4">
                    <div class="single-statics">
                        <div class="part-img">
                            <img src="assets/img/svg/investor.svg" alt="investor">
                        </div>
                        <div class="part-text">
                            <span class="counter">900</span>
                            <span class="title">إجمالي المستثمرين</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-sm-10 col-md-4">
                    <div class="single-statics">
                        <div class="part-img">
                            <img src="assets/img/svg/withdraw.svg" alt="investor">
                        </div>
                        <div class="part-text">
                            <span class="counter">900</span>
                            <span class="title">المسحوبات</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-sm-10 col-md-4">
                    <div class="single-statics">
                        <div class="part-img">
                            <img src="assets/img/svg/money-transfering.svg" alt="investor">
                        </div>
                        <div class="part-text">
                            <span class="counter">4600</span>
                            <span class="title">مقدار الايداعات</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End statics-section -->

@endsection


@section('js')

<script>

$(window).on('load',function(){


    // calc Earn Home Page

    $(".displayed-selected-plan").on('change', function(e){

    let days = $(this).find(':selected').attr('data-days');
    let rate = $(this).find(':selected').attr('data-rate');

    $(".calculate-all").on('click', function(){
        if($('.inputted-amount').val()){
            let input = parseInt($('.inputted-amount').val());

            $(this).html('<i class="fas fa-sync fa-spin"></i>');

            setTimeout(getcalc , 1000);

            function getcalc(){

                $(".calculate-all").html('احسب');

                    // net profit

                    let resultprofit = parseFloat(input * rate/100 * days);

                    $('.js_netProfit').text('$' + resultprofit);

                    // Total amount owed at the end of the period

                    let amount = parseFloat(resultprofit + input);

                    $('.js_totalPercentage').text('$' + amount);

                    // daily earnings

                    let dailyEarn = parseFloat(input * rate/100);

                    $('.js_dailyProfit').text('$' + dailyEarn);

                    // Refund at the end of the period

                    $('.js_totalReturn').text('$' + input);

                }

            }
    })

    });

});

</script>

@endsection

