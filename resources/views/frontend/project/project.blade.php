@include('frontend/main/layout/head')

  <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><b>Project</b></h2>
          <ol>
            <li><a href="{{ route('index') }}" class="text-white">Home</a></li>
            <li>Project</li>
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
            <img class="card-img-top" src="{{ asset('images/projects/'.$project->image) }}" alt="{{ $project->title}}"></a>@if($project->upcoming_project == '1')<span class="upcoming">upcoming project</span> @endif
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
          <h2 class="text-danger">No service found!</h2>
          @endforelse

        </div>
      </div>
    </section>

@include('frontend/main/layout/footer')