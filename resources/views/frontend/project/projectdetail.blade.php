@include('frontend/main/layout/head')

  <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>Project</b></h2>
          <ol>
            <li><a href="{{ route('index') }}" class="text-primary">Home</a></li>
            <li><a href="{{ route('frontend.project') }}" class="text-primary">Project</a></li>
            <li class="text-primary">{{ $data['project']->title}}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
        <div class="row gy-4">
          <div class="col-md-10 col-lg-10 col-sm-11 offset-md-1">
            <h3 class="text-primary text-center">{{ $data['project']->title}} </h3>
            <hr>
            <div class="body">
              <p><img src="{{ asset('images/projects/'.$data['project']->image) }}" alt="{{ $data['project']->title}}" class="thumb_image"></p>
              <p>{!! $data['project']->description !!}</p>
            </div>

          </div>
        </div>
      </div>
    </section>

@include('frontend/main/layout/footer')