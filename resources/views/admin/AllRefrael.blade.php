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
    </div>
<div class="container mb-5">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
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
            <div class="transactions-table">
                <h3 class="title">جميع الإحالات</h3>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>المسلسل</th>
                            <th>اسم الحساب</th>
                            <th>تعيين ربح الإحالة</th>
                        </tr>
                        @forelse ($AllRefrael as $ref_All)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ route('admin.showReferals', $ref_All->id) }}">{{ $ref_All->user->name }}</a></td>
                                <td>
                                    <a class="btn btn-success" href="#set{{ $ref_All->id }}" data-toggle="modal" data-target="#set{{ $ref_All->id }}">تعيين</a>
                                </td>
                            </tr>
                            <!-- model afflate edit -->
                            <div class="modal fade" id="set{{ $ref_All->id }}" tabindex="-1" aria-labelledby="set{{ $ref_All->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="set">ربح الإحالة الخاصة ب{{$ref_All->user->name}}  </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    </div>
                                    <form action="{{route('admin.storeRefrals', $ref_All->user_id)}}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                            <label for="balance" class="form-label d-block text-right">ادخل ربح الإحالة</label>
                                            <input type="text" class="form-control" id="balance" placeholder="يجب أن يكون المبلغ عدد صحيح" name="bounce">
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
                            <!-- end model afflate edit -->
                        @empty
                            <tr>
                                <td>لا يوجد اى إحالات</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="transactions-table">
                <h3 class="title">جميع الأرباح المعينة</h3>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>المسلسل</th>
                            <th>اسم الحساب</th>
                            <th>ربح المستخدم</th>
                        </tr>
                        @forelse ($AllRefrael as $ref_All)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ref_All->user->name }}</td>
                                <td>{{ $ref_All->bounce }} $</td>
                            </tr>
                        @empty
                            <tr>
                                <td>لا يوجد اى أرباح معينة</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


