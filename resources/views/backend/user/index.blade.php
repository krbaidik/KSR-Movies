@extends('backend.layout.common')

@section('title')
    KSR | List - User 
@endsection

@section('title2')
    <section class="content-header">
        <h1>
            <a href="{{ route('backend.users.create') }}" class="btn btn-primary btn-block margin-bottom">Create</a>

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard')  }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li class="active"><a href="javascript::void(0)">User</a></li>
            <li class="active"><a href="{{ route('backend.users.index') }}">List</a></li>

        </ol>
    </section>
@endsection

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User Management</h3>
                    </div>
                    @if(session('message'))
                    <div class="alert alert-success alert-dismissible" id="mymessage">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i>{{ session('message') }}</h4>

                    </div>
                    @endif


                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>

                            <tr>
                                <th>S.N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $i = 1; @endphp

                           @if($data['users']->count() > 0)
                               @foreach($data['users'] as $u)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><a href="{{route('backend.users.edit', ['id' => $u->id])}}">{{ $u->name }}</a></td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->contact ?? 'N/A' }}</td>
                                        <td>
                                            @if($u->status == 1)
                                            <button type="button" class="btn btn-block btn-success">Active</button>
                                            @else
                                            <button type="button" class="btn btn-block btn-danger">In Active</button>
                                                @endif
                                        </td>
                                        <td>
                                            {{--<button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>--}}
                                            <a href="{{route('backend.users.edit', ['id' => $u->id])}}" type="button" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                            <a href="{{route('backend.users.destroy', ['id' => $u->id])}}" type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                               @else
                               <tr><td colspan="6">Data not found</td></tr>

                               @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

    </section>

@endsection

@section('pagecss')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.css') }}">
    @endsection

@section('jsforpage')
    <!-- DataTables -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

    </script>
    @endsection
