@extends('frontend.main.layout.master')

@section('seo')
  <title>Video - {{ $profile->name ?? ''}}</title>
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

@section('videoactive')
  active
@endsection

@section('content')
  <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>Video</b></h2>
          <ol>
            <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
            <li>Video</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
        <div class="row gy-4">
          @forelse($data['video'] as $index=>$video)
          <div class="col-md-6 col-lg-6 col-sm-12">
            <iframe width="100%" height="300" src="https://www.youtube.com/embed/{{ $video->video_link}}" title="{{ $video->title}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <h5 class="pt-2 text-success"><b><i>- {{ $video->title }}</i></b></h5>
            <hr>
          </div>
          @empty
          <h2 class="text-danger">No videos found!</h2>
          @endforelse
          <span class="paginate">{{$data['video']->links()}}</span>
        </div>
      </div>
    </section>

@endsection