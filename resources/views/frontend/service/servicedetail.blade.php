@extends('frontend.main.layout.master')

@section('seo')
  <title>[Service] {{ $data['service']->title}} - {{ $profile->name ?? ''}}</title>
  <meta name="description" content="{{ substr($data['service']->description, 0,250) }}" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $profile->name ?? ''}} - {{ $data['service']->title }}" />
  <meta property="og:description" content="{{ substr($data['service']->description, 0,250) }}" />
  <meta property="og:url" content="{{ $profile->website ?? ''}}" />
  <meta property="og:site_name" content="{{ $profile->name ?? ''}}" />
  <meta property="og:image" content="{{ asset('images/services/'.$data['service']->image)}}" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="800" />
  <meta content="no-cache" http-equiv="Cache-Control"/>
  <meta content="0" http-equiv="Expires"/>
  <meta content="Ksr Movies" name="copyright"/>

@endsection

@section('serviceactive')
  active
@endsection

@section('content')
  <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>Service</b></h2>
          <ol>
            <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
            <li><a href="{{ route('frontend.service') }}" class="text-white">Service</a></li>
            <li class="text-white">{{ $data['service']->title}}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
        <div class="row gy-4">
          <div class="col-md-8 col-lg-8 col-sm-8">
            <h3>{{ $data['service']->title}} </h3>
            <hr>
            <div class="body">
              <p><img src="{{ asset('images/services/'.$data['service']->image) }}" alt="{{ $data['service']->title}}" class="thumb_image"></p>
              <p>{!! $data['service']->description !!}</p>
            </div>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-4">
            <h4 class="text-primary">Follow us on Facebook</h4><hr>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/KSR-Movies-pvt-Ltd-108681024874234/&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
          </div>
        </div>
      </div>
    </section>

@endsection