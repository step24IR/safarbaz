@extends('admin.layouts.admin' , ['sectionName' => 'نمایش دسته بندی'])

@section('title' , 'نمایش دسته بندی')

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
                        <div><h3 class="card-title mb-3">نمایش اطلاعات : {{ $category->name }}</h3></div>
                        <div><a href="{{route('admin.category.index')}}" class="btn btn-primary p-2">نمایش دسته بندی ها</a></div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <tbody>
                            <tr class="text-white">
                                <td>نام</td>
                                <td>{{$category->name}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>اسلاگ</td>
                                <td>{{$category->slug}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>والد</td>
                                <td>{{$category->parent->name}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
