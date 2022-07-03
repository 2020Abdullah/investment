@extends('layout.master')

@section('title')
  صفحة الباقات
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

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <h3 class="title">
                    أضف باقة جديدة
                </h3>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                @endif
                <div class="add-package-card card">
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.add')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="package">اسم الباقة</label>
                                    <input type="text" class="form-control" id="package" name="packageName" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="package_code">رقم الباقة</label>
                                    <input type="text" class="form-control" id="package_code" name="package_code" required>
                                    </div>
                                    <div class="form-group">
                                    <label for="price">سعر الباقة</label>
                                    <input type="text" class="form-control" name="price" id="price" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group expire-date-elem">
                                        <label for="time">مدة الباقة</label>
                                        <div class="form-group">
                                            <input type="text" name="time" class="form-control" id="time" placeholder="عدد الشهور" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="rate">نسبة الربح</label>
                                        <input type="text" class="form-control" name="rate" id="rate" placeholder="نسبة مئوية" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="feature1">ميزة 1</label>
                                            <input type="text" class="form-control" name="feature1" id="feature1" placeholder="ميزة مخصصة">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="feature2">ميزة 2</label>
                                            <input type="text" class="form-control" name="feature2" id="feature2" placeholder="ميزة مخصصة">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="feature3">ميزة 3</label>
                                            <input type="text" class="form-control" name="feature3" id="feature3" placeholder="ميزة مخصصة">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="feature4">ميزة 4</label>
                                            <input type="text" class="form-control" name="feature4" id="feature4" placeholder="ميزة مخصصة">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-hyipox-medium btn-add-new-card">أضف باقة جديدة</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3">
                <h3 class="title">
                    الباقات المضافة في الموقع
                </h3>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <tr role="row">

                            <th class="sorting_asc">المسلسل</th>

                            <th class="sorting">اسم الباقة</th>

                            <th class="sorting_asc">سعر الباقة</th>

                            <th class="sorting">مدة الباقة</th>

                            <th class="sorting_asc">نسبة ربح الباقة</th>

                            <th class="sorting">مميزات الباقة</th>

                        </tr>
                        @forelse($packages as $pack)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pack->packege_name }}</td>
                                <td>{{ $pack->packege_price }}</td>
                                <td>{{ $pack->packege_time }} شهور</td>
                                <td>{{ $pack->packege_rate }} %</td>
                                <td>
                                    <ul>
                                        <li>{{ $pack->packege_feature_1 }}</li>
                                        <li>{{ $pack->packege_feature_2 }}</li>
                                        <li>{{ $pack->packege_feature_3 }}</li>
                                        <li>{{ $pack->packege_feature_4 }} </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>لا توجد اى باقات مضافة</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End account begin -->
@endsection

