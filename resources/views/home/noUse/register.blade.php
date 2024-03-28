@extends('home.layouts.auth' , ['sectionName' => 'داشبورد'])

@section('title' , 'اتاق ها')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">ثبت نام</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="login-wrap p-0 text-right">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('register')}}" method="post" class="signin-form">
                    @csrf
                    <div class="form-group">
                        <input type="text" dir="rtl" name="name" id="name" class="form-control" placeholder="نام و نام خانوادگی" required>
                    </div>
                    <div class="form-group">
                        <input type="email" dir="rtl" name="email" id="email" class="form-control" placeholder="ایمیل" required>
                    </div>
                    <div class="form-group">
                        <input id="password-field1" name="password" dir="rtl" type="password" class="form-control"  autocomplete="new-password" placeholder="رمز ورود" required>
                        <span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input id="password-field2" name="password_confirmation" dir="rtl" type="password" class="form-control" placeholder="تکرار رمز ورود" required>
                        <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="role" value="user">
                        <button type="submit" class="form-control btn btn-primary submit px-3">ثبت نام</button>
                    </div>
                    <h6 class="mb-4 text-center">ثبت نام کرده اید؟  <a href="{{route('login')}}" class="px-2 py-2 mr-md-1 rounded"> ورود</a></h6>

                </form>
            </div>
        </div>
    </div>
@endsection
