@extends('layout.master')

@section('title')
المشتركين في الباقة
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

<!-- set Earn system -->
<div class="sub-title">
    <h3>
        جميع المشتركين في هذه الباقة
    </h3>
    <a href="#setAll" class="btn btn-success" data-toggle="modal" data-target="#setAll"><i class="fa fa-money-bill"></i> تعيين للجميع</a>
    @foreach ($accounts as $account)
    <!-- Modal Earn All user -->
    <div class="modal fade" id="setAll" tabindex="-1" aria-labelledby="setAll" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="setAll">تعيين أرباح المشتركين في هذه الباقة</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{route('admin.updateaccounts', $account->pack_id)}}" method="POST">
        @csrf
        <input type="hidden" value="{{ $account->invoice_value }}" name="invoice_value" />
        <div class="modal-body">
        <div class="form-group">
            <label for="daily_earnings" class="form-label d-block text-right">ادخل الربح اليومي</label>
            <input type="text" class="form-control" id="daily_earnings" name="daily_earnings">
        </div>
        <div class="form-group">
            <label for="net_profit" class="form-label d-block text-right">الربح صافي</label>
            <input type="text" class="form-control" id="net_profit" name="net_profit">
        </div>
        <div class="form-group">
            <label for="net_profit" class="form-label d-block text-right">المبلغ المستحق في نهاية الفترة</label>
            <input type="text" class="form-control" id="deposited_amount" name="deposited_amount">
        </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">إلغاء</button>
        <button type="submit" class="btn btn-success">حفظ للجميع</button>
        </div>
        </form>
        </div>
        </div>
        </div>
        <!-- End Modal Earn All user -->
    </div>
    @endforeach
</div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr role="row">

                        <th class="sorting_asc">المسلسل</th>

                        <th class="sorting">اسم العميل</th>

                        <th class="sorting">المبلغ المستثمر</th>

                        <th class="sorting">الباقات</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($accounts as $account)
                    <tr role="row" class="odd">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->invoice_value }} $</td>
                        <td>{{ $account->packege_name }}</td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="11">لا توجد بيانات</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
<!-- End set Earn system -->

<!-- Earn system -->
<div class="sub-title mt-5">
    <h3>
        أرباح المشتركين في هذه الباقة
    </h3>
</div>
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead>
                <tr role="row">

                    <th class="sorting_asc">المسلسل</th>

                    <th class="sorting">اسم العميل</th>

                    <th class="sorting">الأرباح اليومية</th>

                    <th class="sorting">الربح الصافي</th>

                    <th class="sorting">المبلغ المستحق في نهاية الفترة</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($sys_Earn as $Earn)
                @if ($Earn->daily_earnings !== null)
                    <tr role="row" class="odd">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $Earn->name }}</td>
                        <td>{{ $Earn->daily_earnings }} $</td>
                        <td>{{ $Earn->net_profit }} $</td>
                        <td>{{ $Earn->deposited_amount }} $</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="11">لا توجد أرباح معينة بعد</td>
                    </tr>
                @endif
                @empty
                    <tr>
                        <td colspan="11">لا توجد بيانات</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<!-- End Earn system -->


</div>
</div>

</div>

</div>

@endsection

