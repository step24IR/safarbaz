@extends('home.layouts.auth' , ['sectionName' => 'داشبورد'])

@section('title' , 'اتاق ها')

@section('content')
    <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">ورود</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0 text-right">
                    <form action="{{route('login')}}" method="post" class="signin-form">
                        <div class="form-group">
                            <input type="email" name="email" dir="rtl" id="email" class="form-control" placeholder="ایمیل" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" name="password" dir="rtl" type="password" class="form-control" placeholder="رمز ورود" autocomplete="new-password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">ورود</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 ml-3 text-md-left">
                                <a href="#" style="color: #fff">فراموشی پسورد</a>
                            </div>
                            <div class="w-50" style="margin-right: 30px;">
                                <label class="checkbox-wrap checkbox-primary ">
                                    <input name="remember" type="checkbox" checked>
                                    <span class="checkmark"></span>
                                    مرا بخاطر بسپار
                                </label>
                            </div>
                        </div>
                        <h6 class="mb-4 text-center">ثبت نام نکرده اید؟  <a href="{{route('register')}}" class="px-2 py-2 mr-md-1 rounded"> ثبت نام</a></h6>
                    </form>
                </div>
            </div>
        </div>
@endsection
