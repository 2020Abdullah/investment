@extends('layout.master')

@section('title')
إعداداتك الشخصية
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
<div class="part-img">
<img src="assets/img/member-1.jpg" alt="">
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

        <!-- payment begin -->
        <div class="profile">
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
                <div class="col-lg-9">
                    <h3 class="title">بيانات الإيداع </h3>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{session('status')}}
                        </div>
                    @endif
                    <div class="payment-info">
                        <div class="responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>رقم الفاتورة</td>
                                    <td>تاريخ الفاتورة</td>
                                    <td>الباقة</td>
                                    <td>المبلغ المستثمر</td>
                                    <td>نسبة الربح اليومي</td>
                                    <td>المدة</td>
                                </tr>
                                @forelse ($packages as $pack)
                                <tr>
                                    <td>{{$pack->invoices_num}}</td>
                                    <td>{{$pack->invoices_date}}</td>
                                    <td>{{$pack->packege_name}}</td>
                                    <td>{{$pack->invoice_value}} $</td>
                                    <td>{{$pack->packege_rate}} %</td>
                                    <td>{{$pack->packege_time}} شهور</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td>لا توجد اى إيداعات حالية</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                        <div class="page-num mt-3 mb-5">
                            {!! $packages->links() !!}
                        </div>
                </div>
            </div>
        </div>
        <!-- End payment begin -->
    </div>
</div>
<!-- End account begin -->
@endsection

@section('js')
    <script>

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
