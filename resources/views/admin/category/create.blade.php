@extends('admin.layouts.admin' , ['sectionName' => 'ایجاد دسته بندی'])

@section('title' , 'ایجاد دسته بندی')

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
                <div><h3 class="card-title mb-3">ایجاد دسته بندی</h3></div>
                <div><a href="{{route('admin.category.index')}}" class="btn btn-primary p-2">نمایش دسته بندیها</a></div>
            </div>
            <hr>
            <form action="{{route('admin.category.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label for="name"> نام:</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="نام">
                        @error('name')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label for="slug"> اسلاگ:</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{old('slug')}}" placeholder="اسلاگ">
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
                            <option value="{{ $parentCategory->id }}" @selected(old('parent_id') === $parentCategory->id)>{{ $parentCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary w-100 enter-btn">ایجاد</button>
                </div>

            </form>
        </div>
    </div>
@endsection
