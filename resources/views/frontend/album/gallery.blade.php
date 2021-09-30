@extends('frontend.main.layout.master')

@section('seo')
  <title>Gallery - {{ $profile->name ?? ''}}</title>
  <meta name="description" content="{{ $profile->short_intro ?? '' }}" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $profile->name }} - {{ $profile->short_intro_title ?? '' }}" />
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

@section('albumactive')
  active
@endsection

@section('content')
  <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center" style="text-transform: uppercase;">
          <h2><b>"{{ $data['album_name']}}" Gallery</b></h2>
          <ol>
            <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
            <li><a href="{{ route('frontend.album') }}" class="text-white">Album</a></li>
            <li>{{ $data['album_name']}}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
        <div class="row gy-4">
          @forelse($data['gallery'] as $index=>$gallery)
          <div class="col-md-4 col-lg-4 col-sm-12 item">
            <a href="{{ asset('images/galleries/'.$gallery->image)}}" class="fancybox" data-fancybox="gallery"><img src="{{ asset('images/galleries/'.$gallery->image)}}" title="{{ $gallery->image}}" width="100%" height="220"></a>
          </div>
          @empty
          <h2 class="text-danger">No gallerys found!</h2>
          @endforelse
        </div>
      </div>
    </section>

@endsection