@extends('layout.master')

@section('title')
    الباقات المشترك فيها
@endsection

@section('content')
<!-- breadcrumb -->
<div class="breadcrumb-oitila db-breadcrumb">
    <div class="container">
        <div class="row justify-content-lg-around">
            <div class="col-xl-6 col-lg-7 col-md-5 col-sm-6 col-8">
                <div class="part-txt">
                    <h1>لوحة التحكم </h1>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb  -->
<!-- packages user begin -->
<div class="user-dashboard">
    <div class="container">
        <x-dashboard-menu />

        <div class="row">
            <div class="col-xl-12">
                <h3 class="title">
                    <span>باقاتك الحالية</span>
                    <a href="{{url('/plans-pricing')}}" class="btn btn-success"><i class="fa fa-plus"></i> شراء باقة جديدة</a>
                </h3>
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session('status')}}
                    </div>
                @endif
                @if(session('cancel'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{session('cancel')}}
                    </div>
                @endif
                <div class="row">
                    @forelse ($packages as $pack)
                    <div class="col-md-4">
                        <div class="single-plan">
                            @if ($pack->statue === 1)
                                <span class="bg-success check">مفعلة</span>
                            @else
                                <span class="bg-danger check">غير مفعلة</span>
                            @endif
                            <h3>{{$pack->packege_name}}</h3>
                            <div class="feature-list">
                                <ul>
                                    <li><i class="fas fa-check"></i>{{$pack->packege_feature_1}}
                                    </li>
                                    <li><i class="fas fa-check"></i>{{$pack->packege_feature_2}}
                                    </li>
                                    <li><i class="fas fa-check"></i>{{$pack->packege_feature_3}}
                                    </li>
                                    <li><i class="fas fa-check"></i> {{$pack->packege_feature_4}}
                                    </li>
                                    </li>
                                </ul>
                            </div>
                            <div class="price-info">
                                <span class="parcent">{{$pack->packege_price}} $</span>
                                <span class="price">{{$pack->packege_time}}<small>/ شهور</small></span>
                            </div>
                            <a href="{{ route('package.changePackage', $pack->package_id) }}" class="btn-hyipox-medium price-button">تغيير الباقة</a>
                        </div>
                    </div>
                    @empty
                        <div class="player-profile mt-5">
                            <div class="part-info text-center">
                                لا يوجد لديك اى باقات
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
<!-- End packages begin -->
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
