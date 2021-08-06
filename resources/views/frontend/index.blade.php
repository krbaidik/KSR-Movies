@include('frontend/main/layout/head')

<section id="home">

    <div class="home-content" data-aos="fade-up">
      <h2>{!! $profile->short_intro_title ?? '' !!}</h2>
      <div class="startbtn">
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
        <a href="#projects" class="btn-projects scrollto">Our Projects</a>
      </div>
    </div>

    <div class="home-slider swiper-container">
      <div class="swiper-wrapper">
        <video autoplay muted loop id="myVideo">
          <source src="{{ asset('video/ksr.mp4') }}" type="video/mp4">
        </video>
        {{-- <div class="swiper-slide" style="background-image: url({{ asset('images/company_profile/'.$profile->m_banner ?? '') }} );"></div>
      </div> --}}
    </div>

  </section><!-- End home Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 about-img">
            @if($profile)
            <img src="{{ asset('images/company_profile/'.$profile->short_intro_image ?? '') }}" alt="">
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
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Services <span class="btn btn-info"><a href="/services" class="all">All</a></span></h2>
        </div>

        <div class="row gy-4">
          @forelse($data['services'] as $index=>$service)
          @php
            $delay = 100;
          @endphp
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $delay }}">
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

    <!-- ======= Clients Section ======= -->
    {{-- <section id="clients">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Clients</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>

        <div class="clients-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section> --}}<!-- End Clients Section -->

    <!-- ======= Projects Section ======= -->
    <section id="projects" class="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Projects <span class="btn btn-info m-2"><a href="/projects" class="all">All</a></span><span class="btn btn-danger m-2"><a href="/upcoming-projects" class="all">Upcoming</a></span></h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          @forelse($data['projects'] as $index=>$project)

          <div class="col-lg-4 col-md-6 portfolio-item">
            <img src="{{ asset('images/projects/'.$project->image)}}" class="img-fluid" alt="{{ $project->image}}">
            <div class="portfolio-info">
              <h4>{{ $project->title}}</h4>
              <p>{!! substr($project->description, 0,30)!!}</p>
              <a href="{{ asset('images/projects/'.$project->image)}}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{ $project->title}}"><i class="bx bx-plus"></i></a>
              <a href="{{ route('frontend.projectdetail',$project->slug) }}" class="details-link" title="View detail"><i class="bx bx-link"></i></a>
            </div>
          </div>
          @empty
          <h2 class="text-danger">No project Found!</h2>
          @endforelse

        </div>

      </div><br>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    {{-- <section id="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Testimonials</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
                </p>
                <img src="assets/img/testimonial-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->


          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section> --}}<!-- End Testimonials Section -->

    <!-- ======= Call To Action Section ======= -->
    {{-- <section id="call-to-action">
      <div class="container" data-aos="zoom-out">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>
      </div>
    </section> --}}<!-- End Call To Action Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
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
                  <a href="{{ $team->twitter_url ?? ''}}"><i class="bi bi-twitter"></i></a>
                  <a href="{{ $team->facebook_url ?? ''}}"><i class="bi bi-facebook"></i></a>
                  <a href="{{ $team->instagram_url ?? ''}}"><i class="bi bi-instagram"></i></a>
                  <a href="{{ $team->youtube_url ?? ''}}"><i class="bi bi-youtube"></i></a>
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
        {!! $profile->google_map?? '' !!}
      </div>

      <div class="container">
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

@include('frontend/main/layout/footer')
