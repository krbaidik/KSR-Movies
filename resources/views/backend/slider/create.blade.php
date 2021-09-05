@extends('backend.layout.common')

@section('title')
    Ksr | slider - create
@endsection

@section('title2')
    <section class="content-header">
        <h1>
            <a href="{{ route('backend.sliders.index') }}" class="btn btn-primary btn-block margin-bottom"><i class="fa fa-list"></i>List</a>

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard')  }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li class="active"><a href="#">create</a></li>

        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Slider Management</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('backend.sliders.store') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        @include('backend.slider.partials.forms')

                        <div class="box-footer custom-box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Submit</button>
                            <button type="reset" class="btn btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.col -->
        </div>

    </section>

@endsection


