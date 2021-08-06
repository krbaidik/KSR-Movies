@extends('backend.layout.common')

@section('title')
    Ksr | course - edit
@endsection

@section('title2')
    <section class="content-header">
        <h1>
            <a href="{{ route('backend.courses.index') }}" class="btn btn-primary btn-block margin-bottom"><i class="fa fa-list"></i>List</a>

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard')  }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li class="active"><a href="#">edit</a></li>

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
                        <h3 class="box-title">Course Management</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                         {{ Form::model($data['row'],['route' => ['backend.courses.update', $data['row']->id], 'method' => 'PUT', 'files' => true]) }}

                        @include('backend.course.partials.forms')

                        <div class="box-footer custom-box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Update</button>
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

@include('backend/include/slug')

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description', {
        filebrowserUploadUrl: "{{route('courses.ckupload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
});
</script>

@endsection


