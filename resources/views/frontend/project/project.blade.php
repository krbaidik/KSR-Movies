@extends('frontend.main.layout.master')

@section('seo')
  <title>Project - {{ $profile->name ?? ''}}</title>
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

@section('projectactive')
  active
@endsection

@section('content')

  <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>{{$data['project_type']}}</b></h2>
          <ol>
            <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
            <li>{{$data['project_type']}}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
        <div class="row gy-4">
          @forelse($data['projects'] as $index=>$project)
          @php
            $delay = 100;
          @endphp
          <div class= "col-sm-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $delay }}">
            <div class="card" >
          <a href="{{route('frontend.projectdetail',$project->slug)}}">
            <img class="card-img-top" src="{{ asset('images/projects/'.$project->image) }}" alt="{{ $project->title}}" width="100%" height="250"></a>@if($project->upcoming_project == '1')<span class="upcoming">upcoming project</span> @endif
        <div class="card-body">
          <h5 class="card-title"><a href="{{route('frontend.projectdetail',$project->slug)}}">{{ $project->title}}</a></h5>
          <p class="card-text">{!! substr($project->description, 0,65)!!} [...]</p>
          <a href="{{route('frontend.projectdetail',$project->slug)}}" class="btn btn-info text-white">Read more</a>
        </div>
    </div>
          </div>
          @php
            $delay+=100;
          @endphp
          @empty
          <h2 class="text-danger">No Projects found!</h2>
          @endforelse

        </div>
      </div>
    </section>

@endsection