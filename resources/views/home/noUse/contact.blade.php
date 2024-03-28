@extends('home.layouts.home' , ['sectionName' => 'داشبورد'])

@section('title' , 'اتاق ها')

@section('head')
@endsection

@section('scripts')
@endsection

@section('content')

    <section class="site-hero inner-page overlay" style="background-image: url('{{asset('HomeAssets/images/hero_4.jpg')}}')" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row site-hero-inner justify-content-center align-items-center">
                <div class="col-md-10 text-center" data-aos="fade">
                    <h1 class="heading mb-3">اجاره ویلا و سوئیت در مشهد</h1>
                    <ul class="custom-breadcrumbs mb-4">
                        <li><a href="index.html">خانه</a></li>
                        <li>&bullet;</li>
                        <li>تماس با ما</li>
                    </ul>
                </div>
            </div>
        </div>

        <a class="mouse smoothscroll" href="#next">
            <div class="mouse-icon">
                <span class="mouse-wheel"></span>
            </div>
        </a>
    </section>
    <!-- END section -->
    <!-- END section -->

    <section class="section contact-section" id="next">
      <div class="container">
        <div class="row text-right">
            <div class="col-md-5" data-aos="fade-up" data-aos-delay="200">
                <div class="row">
                    <div class="col-md-10 ml-auto contact-info">
                        <p><span class="d-block">ادرس:</span> <span> خیابان پیروزی و پیروزی 10 و پلاک 75</span></p>
                        <p><span class="d-block">تلفن:</span> <span> 09350909099</span></p>
                        <p><span class="d-block">ایمیل:</span> <span> info@domain.com</span></p>
                    </div>
                </div>
            </div>

            <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">

            <form action="#" method="post" class="bg-white p-md-5 p-4 mb-5 border">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name">نام</label>
                  <input type="text" id="name" class="form-control ">
                </div>
                <div class="col-md-6 form-group">
                  <label for="phone">شماره همراه</label>
                  <input type="text" id="phone" class="form-control ">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="email">ایمیل</label>
                  <input type="email" id="email" class="form-control ">
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-md-12 form-group">
                  <label for="message">نوشتن پیام</label>
                  <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="submit" value="ارسال پیام" class="btn btn-primary text-white font-weight-bold">
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>
@endsection
