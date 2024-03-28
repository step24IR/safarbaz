@extends('admin.layouts.admin' , ['sectionName' => 'داشبورد'])

@section('title' , 'ایجاد کاربر')

@section('head')
    <style>

    </style>
@endsection


@section('scripts')
    <script type="module">

    </script>
@endsection

@section('content')
    <div class="card col-md-6 mx-auto">
        <div class="card-body px-5 py-4">
            <div class="d-flex justify-content-between">
                <div><h3 class="card-title mb-3">ایجاد کاربر</h3></div>
                <div><a href="{{route('admin.user.index')}}" class="btn btn-primary p-2">نمایش کاربران</a></div>
            </div>
            <hr>
            <form action="{{ route('admin.user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name"> نام و نام خانوادگی *</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="نام">
                    @error('name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="number"> شماره موبایل *</label>
                    <input type="text" name="number" value="{{old('number')}}" class="form-control" id="number" autocomplete="none" placeholder="شماره موبایل">
                    @error('number')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">رمز ورود *</label>
                    <input type="password" name="password" value="{{old('password')}}" class="form-control" id="password" autocomplete="new-password" placeholder="رمز ورود">
                    @error('password')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">تکرار رمز ورود *</label>
                    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" id="password_confirmation" placeholder="تکرار رمز ورود">
                </div>
                <div class="form-group">
                    <label for="role">نقش *</label>
                    <select name="role" class="form-control" id="role">
                        @foreach($roles as $role)
                            <option> {{$role->name}}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary w-100 enter-btn">ایجاد</button>
                </div>
            </form>
        </div>
    </div>
@endsection
