@extends('layout.master')

@section('title')
صفحة الإحالات
@endsection

@section('content')
<!-- breadcrumb begin -->
<div class="breadcrumb-oitila db-breadcrumb">
<div class="container">
<div class="row justify-content-lg-around">
<div class="col-xl-6 col-lg-7 col-md-5 col-sm-6 col-8">
<div class="part-txt">
<h1>صفحتك الشخصية</h1>
</div>
</div>
<div class="col-xl-6 col-lg-5 col-md-7 col-sm-6 col-4 d-flex align-items-center">
<div class="db-user-profile">
<div class="part-data">
<span class="name">{{Auth::user()->name}}</span>
<a class="nav-link logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    تسجيل الخروج
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- End breadcrumb begin -->
<!-- account begin -->
<div class="user-dashboard">
    <div class="container">

        <x-dashboard-menu />

        <div class="Refreal-section profile">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3">
                    <div class="accont-tab">
                        <div class="nav flex-column" id="v-pills-tab" aria-orientation="vertical">
                            <a class="nav-link active" href="{{route('user.profile')}}"><i class="far fa-user"></i>نبذة عنك</a>
                            <a class="nav-link" id="payment-info-tab" href="{{route('user.payment')}}"><i class="fas fa-credit-card"></i>الإيداعات</a>
                            <a class="nav-link" id="payment-info-tab" href="{{route('user.withdraw')}}"><i class="fas fa-credit-card"></i>مسحوبات</a>
                            <a class="nav-link" id="payment-info-tab" href="{{route('user.Refreal')}}"><i class="fa fa-users"></i>الإحالات</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7">
                    <div class="ref-link">
                    @forelse(auth()->user()->getReferrals() as $referral)
                        <h3 class="title">
                            قم بدعوة  &amp; أصدقائك للحصول علي 18%
                        </h3>
                        <input type="text" value="{{ $referral->link }}" id="link-refral">
                        <button class="copy-btn">
                            <span class="icon"><i class="fas fa-copy"></i></span>
                            <span class="text">Copy</span>
                        </button>
                        <div class="player-profile mt-5">
                            <div class="part-info">
                                <span class="player-name">
                                    عدد المسجلين عن طريقك
                                </span>
                                <h3 class="text-center">
                                    {{ $referral->relationships()->count() }}
                                </h3>
                            </div>
                        </div>
                        <div class="player-profile mt-5">
                            <div class="part-info">
                                <span class="player-name">
                                    عدد عمليات الشراء الخاصة بك
                                </span>
                                <h3 class="text-center">
                                    {{$countbuy}}
                                </h3>
                            </div>
                        </div>
                        <div class="player-profile mt-5">
                            <div class="part-info">
                                <span class="player-name">
                                    مكسب الإحالات الخاصة بك
                                </span>
                                <h3 class="text-center">
                                    {{ $bounce }} $
                                </h3>
                            </div>
                        </div>
                        @empty
                        <div class="player-profile mt-5">
                            <div class="part-info text-center">
                                لا يوجد لديك اى إحالات
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection

@section('js')
<script>
    $(window).on('load',function(){
        if($('.withdraw-method').length){

            $('.withdraw-method').hide();

            $('.select-withdraw').on('change', function(){
                if($(this).find(":selected").val()){
                    $('.withdraw-method').fadeIn(1000);
                }
                else {
                    $('.withdraw-method').fadeOut(1000);
                }
            })

        }
    });

        function calc(){

            $.ajax({
            type: 'GET',
            url: '{{ route('calcEarn') }}',
            success: function(data){
            $('#total').text( data['total'] + ' $' )
            }
            });

        }

        calc();

</script>
@endsection
