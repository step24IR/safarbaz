@extends('home.layouts.home')

@section('title' , 'سفرباز | '.$post->title)
@section('meta_tags')

@endsection

@section('head')
    <style>
        .messageBox {
            position: fixed;
            padding: 20px;
            top: 15%;
            left: 50%;
            z-index: 999;
            background: rgba(0,0,0,1);
            transform: translate(-50%, -50%);
        }
    </style>
@endsection

@section('scripts')
    <script type="module">
        $(document).ready(function() {

            $('.btn-close').on('click' , function (){
                $('#message').remove()
            })
            setTimeout(function() {
                $('#message').remove();
            }, 10000);
        });
    </script>
@endsection

@section('content')
    @if ($errors->any())
        <div class="bg-danger w-75 mx-auto d-flex justify-content-between messageBox" id="message">
            <ul class="text-white">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <div>
                <button type="button" class="btn-close btn btn-outline-light"> X </button>
            </div>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="bg-success w-75 text-white mx-auto d-flex justify-content-between messageBox" id="message">
            {{session('message')}}
            <div>
                <button type="button" class="btn-close btn btn-outline-light"> X </button>
            </div>
        </div>
    @endif
    @if (session()->has('errorMessage'))
        <div class="bg-danger w-75 text-white mx-auto d-flex justify-content-between messageBox" id="message">
            {{session('errorMessage')}}
            <div>
                <button type="button" class="btn-close btn btn-outline-light"> X </button>
            </div>
        </div>
    @endif

    <section class="site-hero inner-page overlay" style="background-image: url('{{asset(env('BLOG_IMAGES_UPLOAD_PATH').$post->image)}}')" data-stellar-background-ratio="0.5">
    </section>

    <section class="bg-light">
        <div class="container text-right">
            <div class="row py-4">
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="p-4 text-lg-right text-center bg-white h-100" data-aos="fade-up" data-aos-delay="300">
                        <div class="">
                            <h3 class="mb-4 text-center">دسته بندی ها</h3>
                            <ul class="list-unstyled pr-0">
                                @foreach(\App\Models\Category::where('parent_id' , 0)->get() as $category)
                                    @if($category->children->count() > 0)
                                        <li class="dropdown mb-3">
                                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                                {{$category->name}}
                                            </a>
                                            <div class="dropdown-menu">
                                                @foreach($category->children as $childCategory)
                                                    <a class="{{request()->is('category/'.$childCategory->slug) ? 'text-primary' : 'text-dark'}}" class="dropdown-item" href="{{route('home.posts.category' , ['category' => $childCategory->slug])}}">{{$childCategory->name}}</a>
                                                @endforeach
                                            </div>
                                        </li>
                                    @else
                                        <li class="mb-3" ><a class="{{request()->is('category/'.$category->slug) ? 'text-primary' : 'text-dark'}}" href="{{route('home.posts.category' , ['category' => $category->slug])}}">{{$category->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="pr-lg-4 bg-white" data-aos="fade-up" data-aos-delay="300">
                        <h1 class="py-4 text-center">{{$post->title}}</h1>
                        <p>{!! $post->text !!}</p>
                        <div class="mt-5">
                            <p>
                                <span class="pl-3">تگ ها :</span>
                                @foreach($post->tags as $tag)
                                    <a class="pl-3 badge badge-outline-secondary" href="{{route('home.posts.tag' , ['tag' => $tag->slug])}}">{{$tag->name}}</a>
                                @endforeach
                            </p>
                            <hr>
                            <h3 class=""> دیدگاه ها <span class="pr-5">{{$post->comments()->where('approved' , 1)->count()}}</span></h3>

                            <div class="row d-flex justify-content-center mb-3">
                                <div class="col-9">
                                    <form action="{{route('home.comment.store')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mt-4">
                                                <label class="form-label">نام و نام خانوادگی</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                            <div class="col-md-6 mt-4">
                                                <label class="form-label">ایمیل</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">متن</label>
                                                <textarea rows="3" name="text" class="form-control"></textarea>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                                <button type="submit" class="btn btn-primary">ثبت</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                @foreach($post->comments()->where('approved' , 1)->get() as $comment)
                                    <div class="col-9 mb-3">
                                        <ul class="my-4 list-unstyled">
                                            <li style="background-color: #f5f7fa;" class="rounded-3 row">
                                                <div class="col-md-2 text-center">
                                                    <img src="{{asset('HomeAssets/images/userImageEmpty.png')}}" class="rounded-circle mt-1"/>
                                                    <div class="mt-1">{{$comment->name}}</div>
                                                    <div class="my-1 badge rounded-3 text-white bg-secondary">{{verta($post->updated_at)->format('Y-m-d')}}</div>
                                                </div>
                                                <div class="col-md-10 py-4">
                                                    <p class="mb-4">{{$comment->text}}</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->

@endsection
