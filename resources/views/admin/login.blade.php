@extends('home.layouts.auth' , ['sectionName' => 'داشبورد'])

@section('title' , 'ورود')

@section('head')
    <style>
        .messageBox {
            position: fixed;
            padding: 20px;
            top: 15%;
            left: 50%;
            z-index: 999;
            background: rgba(0,0,0,1);
            transform: translate(-50%, -50%);
        }
    </style>
@endsection

@section('scripts')
    <script>
        $('.btn-close').on('click' , function (){
            $('#message').remove()
        })
        setTimeout(function() {
            $('#message').remove();
        }, 10000);
    </script>
@endsection

@section('content')
    @if ($errors->any())
        <div class="bg-danger pb-0 w-75 mx-auto d-flex justify-content-between messageBox" id="message">
            <ul class="text-white">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <div>
                <button type="button" class="btn-close btn btn-secondary"> X </button>
            </div>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="bg-danger pb-0 w-75 text-white mx-auto d-flex justify-content-between messageBox" id="message">
            {{session('message')}}
            <div>
                <button type="button" class="btn-close btn btn-secondary"> X </button>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">ورود</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0 text-right">
                    <form action="{{route('login.handle')}}" method="post" class="signin-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="number" dir="rtl" id="number" class="form-control" placeholder="شماره همراه" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" name="password" dir="rtl" type="password" class="form-control" placeholder="رمز ورود" autocomplete="new-password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">ورود</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary ">
                                    <input name="remember_me" type="checkbox" checked>
                                    <span class="checkmark"></span>
                                    مرا بخاطر بسپار
                                </label>
                            </div>
{{--                            <div class="w-50 ml-3 text-md-left">--}}
{{--                                <a href="#" style="color: #fff">فراموشی پسورد</a>--}}
{{--                            </div>--}}

                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
