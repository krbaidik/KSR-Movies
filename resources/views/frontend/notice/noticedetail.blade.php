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

@include('frontend/main/layout/footer')