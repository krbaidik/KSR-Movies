@extends('frontend.main.layout.master')

@section('seo')
  <title>{{$data['course_type']->title ?? 'All Courses'}} - {{ $profile->name ?? ''}}</title>
  <meta name="description" content="{{ $profile->short_intro ?? '' }}" />
  <meta property="og:locale" content="en_US" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $profile->name }} - {{$data['course_type']->title ?? 'All Courses'}}" />
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

@section('courseactive')
  active
@endsection

@section('content')

  <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>{{$data['course_type']->title ?? 'All Courses'}}</b></h2>
          <ol>
            <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
            <li>Course</li>
            <li>{{$data['course_type']->title ?? 'All Courses'}}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
        <div class="row gy-4">
          @forelse($data['courses'] as $index=>$course)
          @php
            $delay = 100;
          @endphp
          <div class= "col-sm-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $delay }}">
            <div class="card">
          <a href="{{route('frontend.coursedetail',$course->slug)}}">
            <img class="card-img-top" src="{{ asset('images/courses/'.$course->image) }}" alt="{{ $course->title}}" width="100%" height="250"></a>
        <div class="card-body">
          <h5 class="card-title"><a href="{{route('frontend.coursedetail',$course->slug)}}">{{ $course->title}}</a></h5>
          <p class="card-text short_des">{!! $course->short_description !!}</p>
          <a href="{{route('frontend.coursedetail',$course->slug)}}" class="btn btn-info text-white">Read more</a>
        </div>
    </div>
          </div>
          @php
            $delay+=100;
          @endphp
          @empty
          <h2 class="text-danger">No courses found!</h2>
          @endforelse

        </div>
      </div>
    </section>

@endsection