@extends('backend.layout.common')

@section('title')
    Ksr | team - list
@endsection

@section('title2')
    <section class="content-header">
        <h1>
            <a href="{{ route('backend.teams.create') }}" class="btn btn-primary btn-block margin-bottom"><i class="fa fa-pencil-square-o"></i>Create</a>

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard')  }}"><i class="fa fa-home"></i>Dashboard</a></li>
            <li class="active"><a href="#">list</a></li>

        </ol>
    </section>
@endsection

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Team Management</h3>
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
                                <th>Position</th>
                                <th>Image</th>
                                <th>Facebook url</th>
                                <th>Created_at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($data['rows'] as $i=>$row)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->position }}</td>
                                        <td><img src="{{ asset('images/teams/'.$row->image) }}" alt="{{ $row->image }}" width="200" class="img img-thumbnail"></td>
                                        <td>{{ $row->facebook_url }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            @if($row->status == 1)
                                                <button type="button" class="btn btn-block btn-success">Active</button>
                                            @else
                                                <button type="button" class="btn btn-block btn-danger">In Active</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('backend.teams.show',$row->id)}}" class="btn btn-warning" type="button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{route('backend.teams.edit', $row->id)}}" type="button" class="btn btn-info"><i class="fa fa-edit" aria-hidden="true"></i></a>

                                        {!! Form::open(['method'=>'DELETE', 'url' =>route('backend.teams.destroy', $row->id),'style' => 'display:inline']) !!}

                                        {!! Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit','class' => 'btn btn-danger','title' => 'Delete Post','onclick'=>'return confirm("Confirm delete?")')) !!}

                                        {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @empty
                                @endforelse
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
