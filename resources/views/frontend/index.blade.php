@extends('frontend.main.layout.master')

@section('seo')
  <title>Home - {{ $profile->name ?? ''}}</title>
  <meta name="description" content="{{ $profile->short_intro ?? '' }}" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $profile->name ?? '' }} - Home" />
  <meta property="og:description" content="{{ $profile->short_intro ?? ''}}" />
  <meta property="og:url" content="{{ $profile->website ?? ''}}" />
  <meta property="og:site_name" content="{{ $profile->name ?? '' }}" />
  @if($profile)
  <meta property="og:image" content="{{ asset('images/company_profile/'.$profile->main_logo)}}" />
  @endif
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="800" />
  <meta content="no-cache" http-equiv="Cache-Control"/>
  <meta content="0" http-equiv="Expires"/>
  <meta content="Ksr Movies" name="copyright"/>

@endsection

@section('indexactive')
  active
@endsection

@section('content')

<section id="home">
@if(count($data['sliders']) > 0)
    <div class="home-slider">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    @foreach($data['sliders'] as $index=>$slider)
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="@if($index == '0') active @endif" aria-current="true" aria-label="Slide {{ $index }}"></button>
    @endforeach
  </div>
  <div class="carousel-inner">
  @foreach($data['sliders'] as $index=>$slider)
    <div class="carousel-item @if($index == '0') active @endif">
      <img src="{{ asset('images/sliders/'.$slider->slider_image)}}" class="d-block w-100" alt="{{ $slider->title}}">
      <div class="carousel-caption d-md-block">
        <p class="carousel_text">{{ $slider->title}}</p>
      </div>
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" title="Previous">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" title="Next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>

@else
      <div class="swiper-wrapper">
        <video autoplay muted loop id="myVideo">
          <source src="{{ asset('video/ksr.mp4') }}" type="video/mp4">
        </video>
      </div>
@endif


  </section><!-- End home Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 about-img">
            @if($profile)
            <img src="{{ asset('images/company_profile/'.$profile->short_intro_image ?? '') }}" alt="{{ $profile->short_intro_image}}">
            @endif
          </div>

          <div class="col-lg-6 content">
            <h2>{!! $profile->short_intro_title ?? '' !!}</h2>
            <p>{!! $profile->short_intro ?? ''!!}</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services">
      <div class="container" data-aos="fade-right">
        <div class="section-header">
          <h2>Services <span class="btn btn-info"><a href="/services" class="all">All</a></span></h2>
        </div>

        <div class="row gy-4">
          @forelse($data['services'] as $index=>$service)
          @php
            $delay = 100;
          @endphp
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="{{ $delay }}">
            <div class="box">
              <div class="icon"><img src="{{ asset('images/services/'.$service->image) }}" alt="{{$service->image}}" width="200" class="img img-thumbnail m-2"></div>
              <h4 class="title"><a href="">{{ $service->title}}</a></h4>
              <p class="description">{!! substr($service->description, 0,80) !!} <a href="{{ route('frontend.servicedetail',$service->slug) }}" class="text-primary">Read more</a></p>
            </div>
          </div>
          @php
            $delay+=100;
          @endphp
          @empty
          <h2 class="text-danger">No service found!</h2>
          @endforelse
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Projects Section ======= -->
    <section id="projects" class="portfolio">
      <div class="container" data-aos="fade-left">
        <div class="section-header">
          <h2>Projects <span class="btn btn-info m-2"><a href="/projects" class="all">All</a></span><span class="btn btn-danger m-2"><a href="/upcoming-projects" class="all">Upcoming</a></span></h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-left" data-aos-delay="200">
          @forelse($data['projects'] as $index=>$project)

          <div class="col-lg-4 col-md-6 portfolio-item">
            <img src="{{ asset('images/projects/'.$project->image)}}" class="img-fluid" alt="{{ $project->image}}">
            <div class="portfolio-info">
              <h4>{{ $project->title}}</h4>
                  <a href="{{ route('frontend.projectdetail',$project->slug) }}" class="btn btn-warning" title="View detail"><i class="bi bi-eye"></i> View</a>
            </div>
          </div>
          @empty
          <h2 class="text-danger">No project Found!</h2>
          @endforelse

        </div>

      </div><br>
    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="zoom-in-up">
        <div class="section-header">
          <h2>Our Team</h2>
        </div>
        <div class="row">
          @forelse($data['teams'] as $index=>$team)
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{ asset('images/teams/'.$team->image) }}" alt="{{$team->image}}"></div>
              <div class="details">
                <h4>{{ $team->name}}</h4>
                <span>{{ $team->position}}</span>
                <div class="social">
                  <a href="{{ $team->twitter_url ?? ''}}"><i class="bi bi-twitter" title="twitter"></i></a>
                  <a href="{{ $team->facebook_url ?? ''}}"><i class="bi bi-facebook" title="facebook"></i></a>
                  <a href="{{ $team->instagram_url ?? ''}}"><i class="bi bi-instagram" title="instagram"></i></a>
                  <a href="{{ $team->youtube_url ?? ''}}"><i class="bi bi-youtube" title="youtube"></i></a>
                </div>
              </div>
            </div>
          </div>
          @empty
          <h2 class="text-danger">No team found!</h2>
          @endforelse
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Contact Us</h2>
          <p>{!! $profile->short_intro_title ?? '' !!}</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>{{ $profile->address ?? ''}}</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:{{$profile->phone?? ''}}">{{$profile->phone?? ''}}</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:{{$profile->email?? ''}}">{{$profile->email?? ''}}</a></p>
            </div>
          </div>

        </div>
      </div>

      <div class="container mb-4">
        <iframe src="https://www.google.com/maps/embed?pb={{ $profile->google_map ?? '!1m18!1m12!1m3!1d3594417.591740521!2d81.88571547673442!3d28.383829327799834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995e8c77d2e68cf%3A0x34a29abcd0cc86de!2sNepal!5e0!3m2!1sen!2snp!4v1629526819552!5m2!1sen!2snp'}}" width="100%" height="300" style="border:2px solid gray;" allowfullscreen="" title="ksr movies map location"></iframe>
      </div>

      <div class="container">
        <div class="section-header">
          <h2>Give Feedback</h2>
        </div>
        <div class="form">
          <form action="/msgsubmit" method="post">
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" required>
              </div>
            </div>
            <div class="row">
               <div class="form-group mt-3 col-md-6">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group col-md-6 mt-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3 mb-3">
              <textarea class="form-control" name="description" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  @endsection