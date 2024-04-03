@extends('admin.layouts.admin' , ['sectionName' => 'ایجاد پست'])

@section('title' , 'ایجاد پست')

@section('head')
    @vite(['resources/css/admin/ckeditor.css', 'resources/js/admin/ckeditor.js'])
@endsection


@section('scripts')
    <script type="module">

    </script>
@endsection

@section('content')
    <div class="card row">
        <div class="card-body px-5 py-4">
            <div class="d-flex justify-content-between">
                <div><h3 class="card-title mb-3">ایجاد پست</h3></div>
                <div><a href="{{route('admin.post.index')}}" class="btn btn-primary p-2">نمایش پستها</a></div>
            </div>
            <hr>
            <form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="form-group exclusive">
                        <div class="form-check">
                            <label for="published" class="form-check-label">
                                <input type="checkbox" name="published" id="published" class="form-check-input" @checked(old('published') == 'on')>انتشار
                            </label>
                        </div>
                        @error('published')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title"> موضوع:</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" placeholder="موضوع">
                        @error('title')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug"> اسلاگ:</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{old('slug')}}" placeholder="اسلاگ">
                        @error('slug')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">دسته بندی</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') === $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">تصویر شاخص:</label>
                        <input type="file" name="image" class="form-control" id="image" placeholder="تصویر شاخص">
                        @error('image')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>متن:</label>
                        <div class=" text-dark">
                            <textarea name="text" id="editor" placeholder="توضیحات" rows="3">{{old('text')}}</textarea>
                        </div>
                        @error('text')
                        <div class="error text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    @foreach ($tags as $tag)
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <label for="tag_{{ $tag->id }}" class="form-check-label">
                                    <input type="checkbox" name="tags[]" id="tag_{{ $tag->id }}"
                                           value="{{ $tag->id }}" class="form-check-input">{{ $tag->name }}
                                </label>
                            </div>
                            @error('tags')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    @endforeach
                </div>

                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary w-100 enter-btn">ایجاد</button>
                </div>

            </form>
        </div>
    </div>
@endsection
