@extends('backend.layout.common')

@section('title')
    Dashboard
    @endsection
@section('title2')
    <section class="content-header">
        <h1>
            Welcome <b class="text-success">{{ auth()->user()->name}}</b>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        </ol>
    </section>
@endsection

@section('content')

<h3>
    
</h3>
    @endsection()

@section('dahboardjs')
    <script src="{{ asset('assets/backend/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/backend/dist/js/pages/dashboard2.js') }}"></script
@endsection