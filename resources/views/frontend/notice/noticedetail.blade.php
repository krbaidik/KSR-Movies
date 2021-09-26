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
          <div class="col-md-8 col-lg-8 col-sm-8">
            <h3 class="text-primary d-inline">{{ $data['notice']->title}} </h3><span class=""> - posted on: {{ $data['notice']->created_at->format('d M, Y')}}</span>
            <hr>
            <div class="body">
              <span class="sharediv">
                <span class="text-white bg-danger text-center sh" style="font-size: 17px;">Share</span>
            <a href="https://www.facebook.com/share.php?u={{url()->current()}}&t={{$data['notice']->title}}" title="Share on Facebook" class="fshare" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://www.twitter.com/intent/tweet?text={{url()->current()}}" title="Share on Twitter" class="tshare" target="_blank"><i class="bi bi-twitter"></i></a></span>
              <p>{!! $data['notice']->description !!}</p>
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