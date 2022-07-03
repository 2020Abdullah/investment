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
<ul>
    <li>
        <span class="text">المبالغ المستثمرة</span>
        <span class="number">{{ $total }}</span>
    </li>
</ul>
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

    <x-dashboard-menu-admin />

<!-- profile begin -->
<div class="profile">
<div class="row justify-content-center">
<div class="col-md-3">
    <div class="accont-tab">
        <div class="nav flex-column" id="v-pills-tab" aria-orientation="vertical">
            <a class="nav-link active" href="{{route('admin.profile')}}"><i class="far fa-user"></i>نبذة عنك</a>
            <a class="nav-link" id="payment-info-tab" href="{{route('admin.withdraw')}}"><i class="fas fa-credit-card"></i>طلبات السحب</a>
        </div>
    </div>
</div>
<div class="col-lg-9">
<div class="tab-content" id="v-pills-tabContent">
<div class="tab-pane fade show active" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
<h3 class="title">تعديل معلوماتك الشخصية</h3>
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
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
<!-- Modal Profile -->
<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfile" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">بياناتك الشخصية</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.Updateprofile')}}" method="POST">
            @csrf
        <div class="modal-body">
                <div class="form-group">
                  <label for="phone" class="form-label d-block text-right">رقم الهاتف:</label>
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="form-group">
                  <label for="BusinessName" class="form-label d-block text-right">الإسم التجارى:</label>
                  <input class="form-control" id="BusinessName" name="BusinessName"/>
                </div>
                <div class="form-group">
                  <label for="country" class="form-label d-block text-right"> البلد:</label>
                  <input class="form-control" id="country" name="country"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-success">حفظ البيانات</button>
            </div>
        </form>
      </div>
    </div>
  </div>

</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<!-- End profile begin -->
</div>
</div>
<!-- End account begin -->
@endsection
