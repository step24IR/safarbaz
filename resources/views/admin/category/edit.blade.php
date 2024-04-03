@extends('admin.layouts.admin' , ['sectionName' => 'ویرایش دسته بندی'])

@section('title' , 'ویرایش دسته بندی')

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
                <div><h3 class="card-title mb-3">ویرایش دسته بندی</h3></div>
                <div><a href="{{route('admin.category.index')}}" class="btn btn-primary p-2">نمایش دسته بندیها</a></div>
            </div>
            <hr>
            <form action="{{route('admin.category.update' , ['category' => $category->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group">
                        <label for="name"> نام:</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}" placeholder="نام">
                        @error('name')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="slug"> اسلاگ:</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{$category->slug}}" placeholder="اسلاگ">
                        @error('slug')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="parent_id">والد</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="0">بدون والد</option>
                        @foreach ($parentCategories as $parentCategory)
                            <option value="{{ $parentCategory->id }}" @selected($category->id === $parentCategory->id)>{{ $parentCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary w-100 enter-btn">ویرایش</button>
                </div>
            </form>
        </div>
    </div>
@endsection
