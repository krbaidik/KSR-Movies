@extends('frontend.main.layout.master')

@section('seo')
  <title>[{{$data['course']->course_type->title}}] {{ $data['course']->title}} - {{ $profile->name ?? ''}}</title>
  <meta name="description" content="{{ substr($data['course']->description, 0,250) }}" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $profile->name ?? ''}} - {{ $data['course']->title }} {{$data['course']->course_type->title}}" />
  <meta property="og:description" content="{{ substr($data['course']->description, 0,250) }}" />
  <meta property="og:url" content="{{ $profile->website ?? ''}}" />
  <meta property="og:site_name" content="{{ $profile->name ?? ''}}" />
  <meta property="og:image" content="{{ asset('images/courses/'.$data['course']->image)}}" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="800" />
  <meta content="no-cache" http-equiv="Cache-Control"/>
  <meta content="0" http-equiv="Expires"/>
  <meta content="Ksr Movies" name="copyright"/>

@endsection

@section('courseactive')
  active
@endsection

@section('content')

  <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>{{$data['course']->course_type->title}}</b></h2>
          <ol>
            <li><a href="{{ route('index') }}" class="text-primary">Home</a></li>
            <li><a href="{{ route('frontend.course') }}" class="text-primary">Course</a></li>
            <li class="text-primary">{{ $data['course']->title}}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
        <div class="row gy-4">
          <div class="col-md-10 col-lg-10 col-sm-11 offset-md-1">
            <h3 class="text-primary">{{ $data['course']->title}} </h3>
            <hr>
            <div class="body">
              <p><img src="{{ asset('images/courses/'.$data['course']->image) }}" alt="{{ $data['course']->title}}" class="thumb_image"></p>
              <p>{!! $data['course']->description !!}</p>
            </div>

          </div>
        </div>
      </div>
    </section>

@endsection