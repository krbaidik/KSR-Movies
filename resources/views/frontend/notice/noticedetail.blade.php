@extends('frontend.main.layout.master')

@section('seo')
  <title>[Notice] {{ $data['notice']->title}} - {{ $profile->name ?? ''}}</title>
  <meta name="description" content="{{ substr($data['notice']->description, 0,250) }}" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $profile->name ?? ''}} - {{ $data['notice']->title }}" />
  <meta property="og:description" content="{{ substr($data['notice']->description, 0,250) }}" />
  <meta property="og:url" content="{{ $profile->website ?? ''}}" />
  <meta property="og:site_name" content="{{ $profile->name ?? ''}}" />
  @if($profile)
  <meta property="og:image" content="{{ asset('images/company_profile/'.$profile->main_logo)}}" />
  @endif
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="800" />
  <meta content="no-cache" http-equiv="Cache-Control"/>
  <meta content="0" http-equiv="Expires"/>
  <meta content="Ksr Movies" name="copyright"/>

@endsection

@section('noticeactive')
  active
@endsection

@section('content')

  <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>Notice</b></h2>
          <ol>
            <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
            <li>Notice</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
        <div class="row gy-4">
          <div class="col-md-10 col-lg-10 col-sm-11 offset-md-1">
            <h3 class="text-primary d-inline">{{ $data['notice']->title}} </h3><span class=""> - posted on: {{ $data['notice']->created_at->format('d M, Y')}}</span>
            <hr>
            <div class="body">
              <p>{!! $data['notice']->description !!}</p>
            </div>

          </div>
        </div>
      </div>
    </section>

@endsection