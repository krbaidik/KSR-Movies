<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @yield('seo')

  @if($profile)
    <link href="{{ asset('images/company_profile/'.$profile->fav_icon)}}" rel="icon">
  @endif
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- CSS Files -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.9/css/boxicons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
  <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
  <link href="/frontend/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      @if($profile)
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{$profile->email}}" title="email">{{$profile->email}}</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4" title="phone"><span>{{ $profile->phone}}</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="{{$profile->twitter_url ?? ''}}" class="twitter" target="_blank" title="twitter"><i class="bi bi-twitter"></i></a>
        <a href="{{$profile->facebook_url ?? ''}}" class="facebook" target="_blank" title="facebook"><i class="bi bi-facebook"></i></a>
        <a href="{{$profile->instagram_url ?? ''}}" class="instagram" target="_blank" title="instagram"><i class="bi bi-instagram"></i></a>
        <a href="{{$profile->youtube_url}}" class="youtube" target="_blank" title="youtube"><i class="bi bi-youtube"></i></a>
        <a href="{{ route('login')}}"><span class="btn pt-0 pb-0" title="login"><i class="loginicon bi bi-box-arrow-in-right"></i>Login</span></a>
        <a class="text-white clock"><i class="bi bi-clock mr-2"></i><span class="pt-0 pb-0 text-white" title="Time" id="time"> </span></a>
      </div>
      @endif
    </div>
  </section><!-- End Top Bar-->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between pt-3">

      <div id="logo">
        @if($profile)
         <a href="/"><img src="{{ asset('images/company_profile/'.$profile->main_logo) }}" alt="{{ $profile->main_logo}}" width="300" style="height: 130px !important;"></a>
         @endif
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link @yield('indexactive')" href="{{ route('index')}}">Home</a></li>
          <li><a class="nav-link @yield('serviceactive')" href="/services">Services</a></li>
          <li class="dropdown"><a href="/projects" class="@yield('projectactive')"><span>Projects</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/projects">All projects</a></li>
              <li><a href="/upcoming-projects">Upcoming Projects</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="/courses" class="@yield('courseactive')"><span>Courses</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              @forelse($course_type as $ctype)
              <li><a href="{{ route('frontend.course_type',$ctype->slug) }}">{{ $ctype->title}}</a></li>
              @empty
              @endforelse
            </ul>
          </li>
          <li><a class="nav-link @yield('noticeactive')" href="/notice">Notice</a></li>
          <li><a class="nav-link @yield('videoactive')" href="/youtube-videos"><span class="bg-danger text-white p-2"><i class="bi bi-youtube yt"></i> Videos</span></a></li>
          <li><a class=" @yield('albumactive') nav-link" href="/images/album"><i class="bi bi-images" style="font-size: 22px; margin-right: 5px; color: lightblue;"></i> Album</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <div class="telephone">
    <i class="bi bi-telephone"></i><span class="phone"> {{ $profile->phone ?? ''}} </span>
  </div>