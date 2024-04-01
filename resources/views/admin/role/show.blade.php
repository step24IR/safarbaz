@extends('admin.layouts.admin' , ['sectionName' => 'نمایش نقش'])

@section('title' , 'نمایش نقش')

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
                        <div><h3 class="card-title mb-3">نمایش اطلاعات : {{ $role->name }}</h3></div>
                        <div><a href="{{route('admin.role.index')}}" class="btn btn-primary p-2">نمایش نقش ها</a></div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <tbody>
                            <tr class="text-white">
                                <td>نام</td>
                                <td>{{$role->name}}</td>
                            </tr>
                            @if($role->permissions->count() > 0)
                                @foreach($role->permissions->pluck('name') as $key => $permission)
                                    <tr>
                                        <td>مجوز {{ $key + 1 }}</td>
                                        <td>{{$permission}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>مجوز </td>
                                    <td>ندارد</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
