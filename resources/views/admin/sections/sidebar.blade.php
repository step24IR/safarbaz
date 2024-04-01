<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top pe-5">
{{--        <img width="40" height="40" src="...">--}}
        <a class="sidebar-brand brand-logo text-decoration-none text-white" href="{{route('home.index')}}">سفرباز</a>
        <a class="sidebar-brand brand-logo-mini text-decoration-none text-white" href="{{route('home.index')}}">سفرباز</a>
    </div>
    <ul class="nav">
        <li  class="nav-item profile">
            <div  class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle" src="{{asset('HomeAssets/images/auth/pic-4.png')}}" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{auth()->user()->name}}</h5>
                        <span>کاربر</span>
                    </div>
                </div>
{{--                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">--}}
{{--                    <a href="..." class="dropdown-item preview-item">--}}
{{--                        <div class="preview-thumbnail">--}}
{{--                            <div class="preview-icon bg-dark rounded-circle">--}}
{{--                                <i class="mdi mdi-settings text-primary"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="preview-item-content">--}}
{{--                            <p class="preview-subject ellipsis mb-1 text-small">ویرایش حساب</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="..." class="dropdown-item preview-item">--}}
{{--                        <div class="preview-thumbnail">--}}
{{--                            <div class="preview-icon bg-dark rounded-circle">--}}
{{--                                <i class="mdi mdi-onepassword text-info"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="preview-item-content">--}}
{{--                            <p class="preview-subject ellipsis mb-1 text-small">تغییر رمز</p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">{{$sectionName}}</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{route('admin.index')}}">
              <span class="menu-icon">
                <i class="mdi mdi-view-dashboard"></i>
              </span>
                <span class="menu-title pe-2">داشبورد</span>
            </a>
        </li>
        @can('see_rooms')
            <li class="nav-item menu-items">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-icon">
                    <i class="mdi mdi-account-search"></i>
                  </span>
                    <span class="menu-title pe-2">اتاق ها</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.room.index')}}">نمایش اتاق ها</a></li>
                        @can('create_room')
                            <li class="nav-item"> <a class="nav-link" href="{{route('admin.room.create')}}">ایجاد اتاق</a></li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcan
        @can('see_reservations')
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-account-search"></i>
              </span>
                <span class="menu-title pe-2">رزروها</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.reservation.index')}}">نمایش رزروها</a></li>
                    @can('create_reservation')
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.reservation.create')}}">ایجاد رزرو</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endcan
        @can('see_users')
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-city"></i>
              </span>
                <span class="menu-title pe-2">کاربران</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.user.index')}}"> نمایش کاربران </a></li>
                    @can('create_user')
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.user.create')}}"> ایجاد کاربر</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endcan
        @can('see_roles')
        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#android" aria-expanded="false" aria-controls="android">
              <span class="menu-icon">
                <i class="mdi mdi-android"></i>
              </span>
                <span class="menu-title pe-2">نقش ها</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="android">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('admin.role.index')}}"> نمایش نقش ها </a></li>
                    @can('create_role')
                        <li class="nav-item"> <a class="nav-link" href="{{route('admin.role.create')}}"> ایجاد نقش</a></li>
                    @endcan
                </ul>
            </div>
        </li>
        @endcan
    </ul>
</nav>
