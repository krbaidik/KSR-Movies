@extends('backend.layout.common')
@section('pagecss')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.min.css') }}">
@endsection
@section('title')
    Edit Copany Profile
@endsection

@section('title2')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard')  }}"><i class="fa fa-home"></i>Dashboard</a></li>            
            <li class="active">Company Profile</li>

        </ol><br>
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

        @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Company Profile Management</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        {{ Form::model($data['row'],['route' => ['backend.company_profile.update', $data['row']->id], 'method' => 'PUT', 'files' => true]) }}

                       @include('backend.company_profile.includes.forms')

                        <div class="box-footer custom-box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Save</button>
                            <button type="reset" class="btn btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                        </div>
                   {{ Form::close()}}
                </div>
            </div>
            <!-- /.col -->
        </div>

    </section>

@endsection
@section('jsforpage')
    <script src="{{ asset('assets/backend/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection


