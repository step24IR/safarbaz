@extends('admin.layouts.admin' , ['sectionName' => 'ویرایش تگ'])

@section('title' , 'ویرایش تگ')

@section('head')
    <style>

    </style>
@endsection


@section('scripts')
    <script type="module">

    </script>
@endsection

@section('content')
    <div class="card row">
        <div class="card-body px-5 py-4">
            <div class="d-flex justify-content-between">
                <div><h3 class="card-title mb-3">ویرایش تگ</h3></div>
                <div><a href="{{route('admin.tag.index')}}" class="btn btn-primary p-2">نمایش تگها</a></div>
            </div>
            <hr>
            <form action="{{route('admin.tag.update' , ['tag' => $tag->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group">
                        <label for="name"> نام:</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$tag->name}}" placeholder="نام">
                        @error('name')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="slug"> اسلاگ:</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{$tag->slug}}" placeholder="اسلاگ">
                        @error('slug')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary w-100 enter-btn">ویرایش</button>
                </div>
            </form>
        </div>
    </div>
@endsection
