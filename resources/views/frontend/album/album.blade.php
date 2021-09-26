@extends('frontend.main.layout.master')

@section('seo')
  <title>Album - {{ $profile->name ?? ''}}</title>
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

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>Album</b></h2>
          <ol>
            <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
            <li>Album</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
        <div class="row gy-4">
          @forelse($data['album'] as $index=>$album)
          <div class="col-md-4 col-lg-4 col-sm-6 item">
            <a href="{{ route('frontend.gallery',$album->id)}}"><img src="{{ asset('images/albums/'.$album->cover_image)}}" title="{{ $album->cover_image}}" width="100%"></a>
            <h5 class="pt-2 text-danger"><b><i>- {{ $album->title }}</i></b><span class="text-muted text-sm text-gray-500"> - {{ \Carbon\Carbon::parse($album->created_at)->format('d / m / Y')}}
            </span></h5>
            <hr>
          </div>
          @empty
          <h2 class="text-danger">No albums found!</h2>
          @endforelse
          <span class="paginate">{{$data['album']->links()}}</span>
        </div>
      </div>
    </section>

@endsection