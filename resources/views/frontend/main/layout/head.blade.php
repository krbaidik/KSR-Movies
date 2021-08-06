<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ksr Movies</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  @if($profile)
    <link href="{{ asset('images/company_profile/'.$profile->fav_icon)}}" rel="icon">
  @endif
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/frontend/vendor/aos/aos.css" rel="stylesheet">
  <link href="/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/frontend/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      @if($profile)
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{$profile->email}}">{{$profile->email}}</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $profile->phone}}</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="{{$profile->twitter_url ?? ''}}" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="{{$profile->facebook_url ?? ''}}" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="{{$profile->instagram_url ?? ''}}" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="{{$profile->youtube_url}}" class="youtube"><i class="bi bi-youtube"></i></a>
        <a href="{{ route('login')}}"><span class="btn btn-primary pt-0 pb-0"><i class="bi bi-box-arrow-in-right mr-2"></i>Login</span></a>
      </div>
      @endif
    </div>
  </section><!-- End Top Bar-->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between pt-3">

      <div id="logo">
        @if($profile)
         <a href="/"><img src="{{ asset('images/company_profile/'.$profile->main_logo) }}" alt="" width="300" style="height: 130px !important;"></a>
         @endif
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="{{ route('index')}}">Home</a></li>
          <li><a class="nav-link" href="/services">Services</a></li>
          <li class="dropdown"><a href="/projects"><span>Projects</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="/projects">All projects</a></li>
              <li><a href="/upcoming-projects">Upcoming Projects</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="/courses"><span>Courses</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              @forelse($course_type as $ctype)
              <li><a href="{{ route('frontend.course_type',$ctype->slug) }}">{{ $ctype->title}}</a></li>
              @empty
              @endforelse
            </ul>
          </li>
          <li><a class="nav-link" href="/notice">Notice</a></li>
          <li><a class="nav-link" href="/#contact">Contact</a></li>
          <li><a class="nav-link" href="/youtube-videos"><span class="bg-danger text-white p-2"><i class="bi bi-youtube yt"></i> Videos</span></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <div class="telephone">
    <i class="bi bi-telephone"></i><span class="phone"> {{ $profile->phone}} </span>
  </div>