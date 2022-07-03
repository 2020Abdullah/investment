@extends('layout.master')

@section('title')
طلبات السحب
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

        <div class="withdraw-section profile">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="accont-tab">
                        <div class="nav flex-column" id="v-pills-tab" aria-orientation="vertical">
                            <a class="nav-link active" href="{{route('user.profile')}}"><i class="far fa-user"></i>نبذة عنك</a>
                            <a class="nav-link" id="payment-info-tab" href="{{route('user.payment')}}"><i class="fas fa-credit-card"></i>الإيداعات</a>
                            <a class="nav-link" id="payment-info-tab" href="{{route('user.withdraw')}}"><i class="fas fa-credit-card"></i>مسحوبات</a>
                            <a class="nav-link" id="payment-info-tab" href="{{route('user.Refreal')}}"><i class="fa fa-users"></i>الإحالات</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{session('status')}}
                        </div>
                    @endif
                    @if (session('Error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{session('Error')}}
                        </div>
                    @endif
                    <h3 class="title">
                        <span>معلومات السحب</span>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#withdraw"><i class="fa fa-plus"></i> طلب سحب</a>
                        @include('users.model')
                    </h3>
                    <div class="player-profile">
                        <div class="part-info">
                            <span class="player-name">
                                الرصيد القابل للسحب
                            </span>
                            <h3 class="text-center">{{ ($net_profit + $ref_value) - $withdraw_value}} $</h3>
                        </div>
                    </div>
                    <h3 class="title">
                        <span>عمليات السحب</span>
                    </h3>
                    @forelse ($Withdraw as $draw)
                        <div class="payment-info mt-3">
                            <div class="responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>رقم الطلب</td>
                                        <td>{{ $draw->request_num }}</td>
                                    </tr>
                                    <tr>
                                        <td>تاريخ الطلب</td>
                                        <td>{{ $draw->request_date }}</td>
                                    </tr>
                                    <tr>
                                        <td>المبلغ المراد سحبه</td>
                                        <td>{{ $draw->withdraw_value }}</td>
                                    </tr>
                                    <tr>
                                        <td>وسيلة السحب</td>
                                        <td>{{ $draw->withdraw_method }}</td>
                                    </tr>
                                    <tr>
                                        <td>عنوان السحب</td>
                                        <td>{{ $draw->withdraw_address }}</td>
                                    </tr>
                                    <tr>
                                        <td>حالة الطلب</td>
                                        <td>
                                            @if ($draw->withdraw_statue === 0)
                                                قيد المراجعة
                                            @elseif ($draw->withdraw_statue === 1)
                                                تمت المراجعة وجارى تحويل المبلغ
                                            @elseif ($draw->withdraw_statue === 2)
                                                تم الدفع
                                            @elseif ($draw->withdraw_statue === 3)
                                                تم رفض طلبك
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @empty
                        <div class="payment-info">
                            <div class="responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>لا توجد اى عمليات سحب</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endforelse
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
