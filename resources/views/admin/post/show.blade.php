@extends('admin.layouts.admin' , ['sectionName' => 'نمایش پست'])

@section('title' , 'نمایش پست')

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
                        <div><h3 class="card-title mb-3">نمایش اطلاعات : {{ $post->title }}</h3></div>
                        <div><a href="{{route('admin.post.index')}}" class="btn btn-primary p-2">نمایش پست ها</a></div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered text-right">
                            <tbody>
                            <tr class="text-white">
                                <td>انتشار</td>
                                <td class="text-right">{{$post->published}}</td class="text-right">
                            </tr>
                            <tr class="text-white">
                                <td>نویسنده</td>
                                <td>{{$post->user->name}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>موضوع</td>
                                <td>{{$post->title}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>اسلاگ</td>
                                <td>{{$post->slug}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>دسته بندی</td>
                                <td>{{$post->category->name}}</td>
                            </tr>
{{--                            <tr class="text-white">--}}
{{--                                <td>تصویر شاخص</td>--}}
{{--                                <td>{{$post->image}}</td>--}}
{{--                            </tr>--}}
                            <tr class="text-white">
                                <td>متن</td>
                                <td>{!! $post->text !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
