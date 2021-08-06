@extends('backend.layout.common')

@section('title')
    {{ trans('backend/dashboard/general.dashboard') }}
@endsection
@section('actionTitle')
    <section class="content-header">
        <h1>
            {{ trans('backend/dashboard/general.dashboard') }}

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>{{ trans('backend/dashboard/general.dashboard') }}</a></li>
            <li class="active"> {{ trans('backend/dashboard/general.500') }}</li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">

        <div class="error-page">
            <h2 class="headline text-red">500</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>

                <p>
                    We will work on fixing that right away.
                    Meanwhile, you may <a href="{{ route('backend.dashboard') }}">return to dashboard</a> or try using the search form.
                </p>

                <form class="search-form">
                    <div class="input-group">
                        <input name="search" class="form-control" placeholder="Search" type="text">

                        <div class="input-group-btn">
                            <button type="submit" name="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.input-group -->
                </form>
            </div>
        </div>
        <!-- /.error-page -->

    </section>
@endsection()

