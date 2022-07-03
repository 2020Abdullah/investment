@extends('layout.master')

@section('title')
  لوحة التحكم
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
            <div class="transactions-table">
                <h3 class="title">جميع الفواتير</h3>
                <div class="table-responsive">
                    <table id="example" class="display misco-data-table dataTable" role="grid" aria-describedby="example_info">
                        <thead>
                            <tr role="row">

                                <th class="sorting_asc">المسلسل</th>

                                <th class="sorting">رقم الفاتورة</th>

                                <th class="sorting">تاريخ الفاتورة</th>

                                <th class="sorting">اسم العميل</th>

                                <th class="sorting">الباقة</th>

                                <th class="sorting">المبلغ المستثمر</th>

                                <th class="sorting">سكرين التحويل</th>

                                <th class="sorting">نسبة الربح اليومي</th>

                                <th class="sorting">المدة</th>

                                <th class="sorting">حالة الفاتورة</th>
                                <th class="sorting">
                                    اتخاذ إجراء
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices as $inv)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{ $loop->iteration }}</td>
                                <td>{{ $inv->invoices_num }}</td>
                                <td>{{ $inv->invoices_date }}</td>
                                <td>{{ $inv->name }}</td>
                                <td>{{ $inv->packege_name }}</td>
                                <td>{{ $inv->packege_price }} $</td>
                                <td>
                                    <a href="{{ asset('assets/payment_screen/' . $inv->screen ) }}">
                                        <img src="{{ asset('assets/payment_screen/' . $inv->screen ) }}" class="img-fluid inv-img" alt="screen"/>
                                    </a>
                                </td>
                                <td>{{ $inv->packege_rate}} %</td>
                                <td>{{ $inv->packege_time}}</td>
                                <td>
                                    @if ($inv->statue == 0)
                                        غير مدفوعة
                                    @elseif($inv->statue == 1)
                                        مدفوعة
                                    @elseif($inv->statue == 2)
                                        منتهية
                                    @elseif($inv->statue == 3)
                                        محظورة
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                        إجراء
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#payed{{$inv->invoices_num}}" data-toggle="modal" data-target="#payed{{$inv->invoices_num}}">مدفوعة</a>
                                            <a class="dropdown-item" href="{{route('admin.finished', $inv->invoices_num)}}">منتهية</a>
                                            <a class="dropdown-item" href="{{route('admin.ban', $inv->invoices_num)}}">محظورة</a>
                                            <a class="dropdown-item" href="{{route('admin.delete', $inv->invoices_num)}}">حذف</a>
                                        </div>
                                    </div>
                                    <!-- Modal payed -->
  <div class="modal fade" id="payed{{$inv->invoices_num}}" tabindex="-1" aria-labelledby="payed{{$inv->invoices_num}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="payed">مبلغ الفاتورة</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.payed', $inv->invoices_num)}}" method="POST">
            @csrf
            <input type="hidden" value="{{$inv->user_id}}" name="user_id">
        <div class="modal-body">
                <div class="form-group">
                  <label for="invoice_value" class="form-label d-block text-right">ادخل المبلغ المستثمر</label>
                  <input type="text" class="form-control" id="invoice_value" name="invoice_value">
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
<!-- End model payed -->
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="11">لا توجد بيانات</td>
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
<!-- End account begin -->
@endsection

@section('js')
<script src="{{asset('assets/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/js/data-able-active.js')}}"></script>
@endsection
