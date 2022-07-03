@extends('layout.master')

@section('title')
    صفحة الدفع
@endsection

@section('content')
<!-- breadcrumb -->
<div class="breadcrumb-oitila">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-8">
                <div class="part-txt">
                    <h1>صفحة الدفع</h1>
                    <ul>
                        <li>الرئيسية</li>
                        <li>صفحة إنشاء فاتورة </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb  -->
<!-- register begin -->
<div class="pricing-plan">
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-sm-10 col-md-6 prc-col">
                <div class="single-plan">
                    <h3>{{$package->packege_name}}</h3>
                    <div class="feature-list">
                        <ul>
                            <li><i class="fas fa-check"></i>{{$package->packege_feature_1}}
                            </li>
                            <li><i class="fas fa-check"></i>{{$package->packege_feature_2}}
                            </li>
                            <li><i class="fas fa-check"></i>{{$package->packege_feature_3}}
                            </li>
                            <li><i class="fas fa-check"></i> {{$package->packege_feature_4}}
                            </li>
                        </ul>
                    </div>
                    <div class="price-info">
                        <span class="parcent">{{$package->packege_price}}</span>
                        <span class="price">{{$package->packege_time}}<small>/ شهور</small></span>
                    </div>
                    <a href="{{url('plans-pricing')}}" class="btn-hyipox-medium price-button">تغيير الباقة</a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-sm-10 col-md-6 prc-col">
                <div class="payment-info">
                    <h3>طريقة الدفع</h3>
                    <hr/>
                    <p class="text-right">
                        طريقه الايداع والشحن
                        عن طريقه البنوك الالكترونيه
                        بيرفكت موني، بايير
                        usdt trc20
                        ويكون بشكل يدوي تجنبا الاخطاء..ويصل خلال الفتره من دقيقه الي 24 ساعه
                    </p>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                          <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                              <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <img src="{{asset('assets/img/usdt.jpg')}}" width="50"/>
                                <span>usd trc20</span>
                              </button>
                            </h2>
                          </div>

                          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <code>
                                    TF8cgEoy12PJbfd5hhRDG3wZonGCNq54ei
                                </code>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <img src="{{asset('assets/img/payeer.jpg')}}" width="50"/>
                                <span>محفظه بايير</span>
                              </button>
                            </h2>
                          </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                              <code>P1072212801</code>
                            </div>
                          </div>
                        </div>
                        <div class="card">
                          <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                              <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <img src="{{asset('assets/img/pm.jpg')}}" width="50"/>
                                محفظة perfect money
                              </button>
                            </h2>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                              <code>U38058075</code>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="Payment-confirm">
                    <form method="POST" action="{{route('package.store')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$package_id}}" name="package_id"/>
                        <input type="hidden" value="{{ Auth()->user()->id }}" name="user_id"/>
                        <label for="Image" class="form-label"> سكرين من التحويل</label>
                        <input type="file" name="screen" class="form-control @error('screen') is-invalid @enderror" id="screen" required>
                        <span>ملاحظة: الحد الأقصي لحجم الصورة 2mb</span>
                        @error('screen')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="submit" value="تأكيد الدفع" class="btn btn-success btn-pay"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End register begin -->
@endsection
