@extends('layout.master')

@section('title')
    تسجيل حساب جديد
@endsection

@section('content')
<!-- breadcrumb -->
<div class="breadcrumb-oitila">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-8">
                <div class="part-txt">
                    <h1>إنشاء حساب استثمارى جديد</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb  -->
<!-- register begin -->
<div class="register">
    <div class="container">
        <div class="reg-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="row">
                <div class="col-xl-12">
                    <h4 class="sub-title">معلومات شخصية</h4>
                        <input id="name" type="text" placeholder="اسمك بالكامل"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="email" type="email" placeholder="البريد الإلكتروني"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" placeholder=" كلمة المرور" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password-confirm" type="password" class="form-control" placeholder="تأكيد كلمة المرور" name="password_confirmation" required autocomplete="new-password">

                        <input id="password-confirm" type="text" class="form-control" placeholder="رقم هاتفك" name="phone" required autocomplete="phone">

                        <input type="text" id="BusinessName"  placeholder="الاسم التجاري" name="BusinessName">
                        <input type="text" id="country" placeholder="الدولة" name="country">
                </div>
            </div>

                <div class="row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('تسجيل حساب جديد') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End register begin -->
@endsection
