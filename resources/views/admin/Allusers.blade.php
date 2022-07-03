@extends('layout.master')

@section('title')
صفحة مشتركين الباقات
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.css') }}"/>
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
<ul>
<li>
<span class="text">المبلغ المستثمر</span>
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

        <div class="Subscribers">
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3">
                    <ul class="nav justify-content-center">
                        @foreach ($accounts as $account)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.usersshow', $account->pack_id) }}"><i class="fa fa-users"></i> مشتركين {{ $account->packege_name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
    </div>
    </div>

    </div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/js/data-able-active.js')}}"></script>
@endsection
