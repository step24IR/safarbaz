@extends('admin.layouts.admin' , ['sectionName' => 'ویرایش نقش'])

@section('title' , 'ویرایش نقش')

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
                <div><h3 class="card-title mb-3">ویرایش نقش</h3></div>
                <div><a href="{{route('admin.role.index')}}" class="btn btn-primary p-2">نمایش نقشها</a></div>
            </div>
            <hr>
            <form action="{{route('admin.role.update' , ['role' => $role->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group">
                        <label for="name"> نام:</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}" placeholder="نام">
                        @error('name')
                        <div class="alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <label for="permission_{{ $permission->id }}" class="form-check-label">
                                    <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}"
                                           value="{{ $permission->name }}" class="form-check-input"
                                        @checked( in_array( $permission->id , $role->permissions->pluck('id')->toArray() ) )>{{ $permission->label }}
                                </label>
                            </div>
                            @error('permissions')
                            <div class="alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    @endforeach
                </div>
                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary w-100 enter-btn">ویرایش</button>
                </div>
            </form>
        </div>
    </div>
@endsection
