@extends('layout.master')

@section('title')
طلبات السحب
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

        <div class="withdraw-section profile">
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
                        <span>عمليات السحب</span>
                    </h3>
                    <div class="transactions-table">
                        <div class="table-responsive">
                            <table id="example" class="display misco-data-table dataTable" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">

                                        <th class="sorting">رقم الطلب</th>

                                        <th class="sorting">تاريخ الطلب</th>

                                        <th class="sorting">اسم العميل</th>

                                        <th class="sorting">المبلغ المراد سحبه</th>

                                        <th class="sorting">وسيلة السحب</th>

                                        <th class="sorting">عنوان السحب</th>

                                        <th class="sorting">حالة الطلب</th>
                                        <th class="sorting">
                                            اتخاذ إجراء
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Withdraw as $draw)
                                    <tr role="row" class="odd">
                                        <td>{{ $draw->request_num }}</td>
                                        <td>{{ $draw->request_date }}</td>
                                        <td>{{ $draw->name }}</td>
                                        <td>{{ $draw->withdraw_value }}</td>
                                        <td>{{ $draw->withdraw_method }}</td>
                                        <td>{{ $draw->withdraw_address }}</td>
                                        <td>
                                            @if ($draw->withdraw_statue === 0)
                                                قيد المراجعة
                                            @elseif ($draw->withdraw_statue === 1)
                                                تمت الموافقة وجارى تحويل المبلغ
                                            @elseif ($draw->withdraw_statue === 2)
                                                تم الدفع
                                            @elseif ($draw->withdraw_statue === 3)
                                                تم رفض الطلب
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                إجراء
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('admin.withdraw.accepted', $draw->id)}}">موافقة</a>
                                                    <a class="dropdown-item" href="{{route('admin.withdraw.rejeted', $draw->id)}}">رفض</a>
                                                    <a class="dropdown-item" href="{{route('admin.withdraw.payed', $draw->id)}}">تأكيد الدفع</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11">لا توجد اى طلبات سحب</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
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
</script>
@endsection
