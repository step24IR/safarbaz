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
                        <li>درباره ما</li>
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
    <div class="section  bg-light">
        <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7 mb-5">
          <h2 class="heading" data-aos="fade-up">رهبران</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="block-2 text-right">
            <div class="flipper">
              <div class="front" style="background-image: url({{asset('HomeAssets/images/person_3.jpg')}});">
                <div class="box">
                  <h2>محسن مرادی</h2>
                  <p>رهبر</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p>&ldquo;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.&rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                  <div class="image mr-3 align-self-center">
                    <img src="{{asset('HomeAssets/images/person_3.jpg')}}" alt="">
                  </div>
                  <div class="name align-self-center">محسن مرادی <span class="position">رهبر</span></div>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="block-2 text-right"> <!-- .hover -->
            <div class="flipper">
              <div class="front" style="background-image: url({{asset('HomeAssets/images/person_1.jpg')}});">
                <div class="box">
                  <h2>سعید مرادی</h2>
                  <p>مدیر</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p>&ldquo;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.&rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                  <div class="image mr-3 align-self-center">
                    <img src="{{asset('HomeAssets/images/person_1.jpg')}}" alt="">
                  </div>
                  <div class="name align-self-center">سعید مرادی <span class="position">مدیر</span></div>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
          <div class="block-2 text-right">
            <div class="flipper">
              <div class="front" style="background-image: url({{asset('HomeAssets/images/person_2.jpg')}});">
                <div class="box">
                  <h2>علی مرادی</h2>
                  <p>کارمند</p>
                </div>
              </div>
              <div class="back">
                <!-- back content -->
                <blockquote>
                  <p>&ldquo;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.&rdquo;</p>
                </blockquote>
                <div class="author d-flex">
                  <div class="image mr-3 align-self-center">
                    <img src="{{asset('HomeAssets/images/person_2.jpg')}}" alt="">
                  </div>
                  <div class="name align-self-center">علی مرادی <span class="position">کارمند</span></div>
                </div>
              </div>
            </div>
          </div> <!-- .flip-container -->
        </div>
      </div>
    </div>
    </div>
    <!-- END .block-2 -->

    <div class="section">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7 mb-5">
            <h2 class="heading" data-aos="fade">تاریخچه</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-8 text-right">
            <div class="timeline-item" date-is='1402' data-aos="fade">
              <h3>لورم ایپسوم متن ساختگی</h3>
              <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
              <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
            </div>

            <div class="timeline-item" date-is='1398' data-aos="fade">
              <h3>لورم ایپسوم متن </h3>
              <p>
                  لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.
              </p>
            </div>

            <div class="timeline-item" date-is='1395' data-aos="fade">
              <h3>لورم ایپسوم متن ساختگی با تولید سادگی</h3>
              <p>
                  لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.
              </p>
            </div>
          </div>
        </div>


      </div>
    </div>

@endsection
