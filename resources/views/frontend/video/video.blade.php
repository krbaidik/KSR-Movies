@include('frontend/main/layout/head')

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
          <h2 class="text-danger">No video found!</h2>
          @endforelse
          <span class="paginate">{{$data['video']->links()}}</span>
        </div>
      </div>
    </section>

@include('frontend/main/layout/footer')