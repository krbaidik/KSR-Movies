@include('frontend/main/layout/head')

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
          <div class="col-md-10 col-lg-10 col-sm-12 offset-1">
            <h3>News and Notice</h3>
            <hr>
            <ul type="square">
          @forelse($data['notices'] as $index=>$notice)
          <li class="list"><h6 class="d-inline"><b><a href="{{ route('frontend.noticedetail',$notice->slug) }}" class="text-primary">{{ $notice->title }}</a></b></h6><small class="text-muted"> {{ $notice->created_at->format('d M, Y')}}</small></li>
          @empty
          <h2 class="text-danger">No notice found!</h2>
          @endforelse
          </ul>
          </div>
        </div>
          <span class="paginate">{{$data['notices']->links()}}</span>
      </div>
    </section>

@include('frontend/main/layout/footer')