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

<!-- profile begin -->
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
<div class="tab-content" id="v-pills-tabContent">
<div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
<h3 class="title">تعديل معلوماتك الشخصية</h3>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{session('status')}}
        </div>
    @endif
    <div class="player-profile">
    <div class="row no-gutters">
        <div class="col-md-12">
            <div class="part-info">
                <span class="player-name">
                    {{Auth::user()->name}}
                </span>
                <ul class="player-list">
                    <li>
                        <span class="property"><i class="fas fa-info-circle"></i> الإسم بالكامل:</span>
                        <span class="value">{{Auth::user()->name}}</span>
                    </li>
                    <li>
                        <span class="property"><i class="fas fa-info-circle"></i> البريد الإلكتروني :</span>
                        <span class="value">{{Auth::user()->email}}</span>
                    </li>
                    <li>
                        <span class="property"><i class="fas fa-info-circle"></i> رقم الهاتف :</span>
                        <span class="value">{{Auth::user()->phone}}</span>
                    </li>
                    <li>
                        <span class="property"><i class="fas fa-info-circle"></i> الإسم التجارى :</span>
                        <span class="value">{{Auth::user()->BusinessName}}</span>
                    </li>
                    <li>
                        <span class="property"><i class="fas fa-info-circle"></i> البلد :</span>
                        <span class="value">{{Auth::user()->country}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
<div class="edit-profile text-center">
    <a href="#" class="btn-hyipox-2" data-toggle="modal" data-target="#editProfile">تعديل بيانات</a>
    @include('users.model')
</div>
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
                    $('#total').text( data['total'] + ' $' )
                }
            });

        }

        calc();


    </script>
@endsection
