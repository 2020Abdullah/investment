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
                    <h1>لوحة التحكم الإدارة</h1>
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
                        <ul>
                            <li>
                                <span class="text">المبالغ المستثمرة</span>
                                <span class="number">{{ $total }}</span>
                            </li>
                        </ul>
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

        <x-dashboard-menu-admin />

        <div class="user-statics text-center">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-statics">
                        <div class="part-info text-center">
                            <span class="number">{{ $total }}</span>
                            <span class="text">المبالغ المستثمرة</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-statics">
                        <div class="part-info">
                            <span class="number">{{ $regtotal }}</span>
                            <span class="text">عدد المسجلين في الموقع</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-statics">
                        <div class="part-info">
                            <span class="number">{{ $subtotal }}</span>
                            <span class="text">عداد الإشتراكات</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End account begin -->
@endsection
