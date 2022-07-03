@extends('layout.master')

@section('title')
  الإحالات
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
                <h3 class="title">جميع المستخدمين الذين سجلوا عبر هذه الإحالة</h3>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <tr>
                            <td>المسلسل</td>
                            <td>الاسم</td>
                            <td>المبلغ المستثمر</td>
                            <td>حالة الفاتورة</td>
                            <td>تاريخ الانشاء</td>
                        </tr>
                        @forelse ($ref_target as $target)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$target->name}}</td>
                                <td>{{$target->bal}} $</td>
                                <td>
                                    @if ($target->is_buy == 1)
                                        مدفوعة
                                    @else
                                        غير مدفوعة
                                    @endif
                                </td>
                                <td>
                                    @if ($target->ref_date == null)
                                        لا يوجد
                                    @else
                                        {{$target->ref_date}}
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">لا يوجد لديه اى عمليات  شراء</td>
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


