@include('frontend/main/layout/head')

  <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>Service</b></h2>
          <ol>
            <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
            <li>Service</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <div class="container">
        <div class="row gy-4">
          @forelse($data['services'] as $index=>$service)
          @php
            $delay = 100;
          @endphp
          <div class= "col-sm-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $delay }}">
            <div class="card">
          <a href="{{route('frontend.servicedetail',$service->slug)}}">
            <img class="card-img-top" src="{{ asset('images/services/'.$service->image) }}" alt="{{ $service->title}}"></a>
        <div class="card-body">
          <h5 class="card-title"><a href="{{route('frontend.servicedetail',$service->slug)}}">{{ $service->title}}</a></h5>
          <p class="card-text">{!! substr($service->description, 0,65)!!} [...]</p>
          <a href="{{route('frontend.servicedetail',$service->slug)}}" class="btn btn-info text-white">Read more</a>
        </div>
    </div>
          </div>
          @php
            $delay+=100;
          @endphp
          @empty
          <h2 class="text-danger">No service found!</h2>
          @endforelse

        </div>
      </div>
    </section>

@include('frontend/main/layout/footer')