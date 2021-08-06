@extends('backend.layout.common')

@section('title')
    KSR | User - Create
@endsection

@section('title2')
    <section class="content-header">
        <h1>
            <a href="{{ route('backend.users.index') }}" class="btn btn-primary btn-block margin-bottom">List</a>

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard')  }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li class="active"><a href="{{ route('backend.users.index') }}">User</a></li>
            <li class="active"><a href="#">Create</a></li>

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
                        <h3 class="box-title">User Management</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('backend.users.store') }}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="fname">Name</label>
                                <input class="form-control" id="fname" placeholder="Type full name" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" placeholder="Type email" type="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" id="password" placeholder="Password" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="mname">Address</label>
                                <input class="form-control" id="mname" placeholder="Type address" type="text" name="address">
                            </div>
                            <div class="form-group">
                                <label for="lname">Contact</label>
                                <input class="form-control" id="lname" placeholder="Type contact number" type="text" name="contact">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                               <input type="file" name="photo" class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <label class="radio-inline">
                                    <input type="radio" checked name="status" id="inlineRadio1" value="1">Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="inlineRadio2" value="0">Inactive
                                </label>

                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.col -->
        </div>

    </section>

@endsection


