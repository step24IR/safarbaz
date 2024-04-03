@extends('admin.layouts.admin' , ['sectionName' => 'نمایش کامنت'])

@section('title' , 'نمایش کامنت')

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
                        <div><h3 class="card-title mb-3">نمایش اطلاعات : {{ $comment->name }}</h3></div>
                        <div><a href="{{route('admin.comment.index')}}" class="btn btn-primary p-2">نمایش کامنت ها</a></div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <tbody>
                            <tr class="text-white">
                                <td>نام</td>
                                <td>{{$comment->name}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>ایمیل</td>
                                <td>{{$comment->name}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>پست</td>
                                <td>{{$comment->post->title}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>تایید شده</td>
                                <td>{{$comment->approved}}</td>
                            </tr>
                            <tr class="text-white">
                                <td>متن</td>
                                <td>{{$comment->text}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
