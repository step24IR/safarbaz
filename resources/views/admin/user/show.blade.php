@extends('admin.layouts.admin' , ['sectionName' => 'داشبورد'])

@section('title' , 'نمایش کاربر')

@section('head')
    <style>

    </style>
@endsection


@section('scripts')
    <script type="module">

    </script>
@endsection

@section('content')
    <div class="row ">
        <div class="col-md-6 grid-margin mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div><h3 class="card-title mb-3">نمایش اطلاعات : {{ $user->name }}</h3></div>
                        <div><a href="{{route('admin.user.index')}}" class="btn btn-primary p-2">نمایش کاربران</a></div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <tbody>
                            <tr class="text-white">
                                <td>نام</td>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>شماره</td>
                                <td>{{$user->number}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>نقش</td>
                                <td>{{$user->getRoleNames()->first()}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
