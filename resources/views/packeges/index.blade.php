@extends('layout.master')

@section('title')
    خطط الإستثمار
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('assets/fonts/flaticon.css')}}"/>
@endsection

@section('content')
<!-- prcing plan begin -->
<div class="pricing-plan">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8">
                <div class="section-title">
                    <span class="sub-title">
                         الباقات المدفوعة
                    </span>
                    <h2>
                        قم باختيار الخطة المناسبة لك
                    </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center justify-content-md-start">
            @foreach ($packages as $pack)
                <div class="col-xl-3 col-lg-3 col-sm-10 col-md-6 prc-col">
                    <div class="single-plan">
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
                            </ul>
                        </div>
                        <div class="price-info">
                            <span class="parcent">{{$pack->packege_price}} $</span>
                            <span class="price">{{$pack->packege_time}}<small>/ شهور</small></span>
                        </div>
                        @if (isset($currentPackage))
                            <form method="POST" action="{{route('package.storePackage')}}">
                                @csrf
                                <input type="hidden" value="{{$currentPackage}}" name="current_id"/>
                                <input type="hidden" value="{{$pack->id}}" name="package_id"/>
                                <button type="submit" class="btn btn-hyipox-medium price-button">اختيار</button>
                            </form>
                        @else
                            <a href="{{route('package.id', $pack->id)}}" class="btn-hyipox-medium price-button">اختيار</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End prcing plan begin -->
@endsection
