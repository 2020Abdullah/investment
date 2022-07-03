@extends('layout.master')

@section('title')
  لوحة التحكم
@endsection

@section('content')
<!-- breadcrumb begin -->
<div class="breadcrumb-oitila db-breadcrumb">
    <div class="container">
        <div class="row justify-content-lg-around">
            <div class="col-xl-6 col-lg-7 col-md-5 col-sm-6 col-8">
                <div class="part-txt">
                    <h1>لوحة التحكم</h1>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-7 col-sm-6 col-4 d-flex align-items-center">
                <div class="db-user-profile">
                    <div class="part-data">
                        <span class="name">{{Auth()->user()->name}}</span>
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

        <div class="user-statics">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-statics">
                        <div class="part-info">
                            <span class="number" id="net_profit">
                                $ 0
                            </span>
                            <span class="text">الربح القابل للسحب</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-statics">
                        <div class="part-info">
                            <span class="number" id="deposited_amount">0</span>
                            <span class="text">إجمالي المبلغ المستحق في نهاية الفترة
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-statics">
                        <div class="part-info">
                            <span class="number" id="daily_earnings">0 $</span>
                            <span class="text">الأرباح اليومية</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-statics">
                        <div class="part-info">
                            <span class="number" id="total">
                                0 $
                            </span>
                            <span class="text">المبلغ المسترد في نهاية الفترة</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-statics">
                        <div class="part-info">
                            <span class="number" id="ref_total">0</span>
                            <span class="text">ارباح الاحالات</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                    console.log(data);

                    $('#net_profit').text(data['net_profit'] + ' $');

                    $('#daily_earnings').text( data['daily_earnings'] + ' $' )

                    $('#deposited_amount').text( data['deposited_amount'] + ' $' )

                    $('#total').text( data['total'] + ' $' )

                    $('#ref_total').text( data['ref_total'] + ' $' )

                }
            });

        }

        calc();


    </script>
@endsection
