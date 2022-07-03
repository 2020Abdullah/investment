@extends('layout.master')

@section('title')
    تسجيل الدخول
@endsection

@section('content')
<!-- breadcrumb begin -->
<div class="breadcrumb-oitila">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-8">
                <div class="part-txt">
                    <h1>تسجيل الدخول</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb begin -->

<!-- login begin -->
<div class="login">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-7 col-sm-9">
                <div class="form-area">
                    <div class="row no-gutters">
                        <div class="col-xl-6 col-lg-6">
                            <div class="login-form">
                                <form method="POST" action="{{route('login')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">البريد الإلكتروني</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">الباسورد</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="submit" class="btn-form" value="تسجيل الدخول">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 d-xl-block d-lg-block d-none">
                            <div class="blank-space">
                                <img src="{{asset('assets/img/login & reg/login.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End login begin -->
@endsection
