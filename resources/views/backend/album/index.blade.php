@extends('backend.layout.common')

@section('title')
    Ksr | team - list
@endsection

@section('title2')
    <section class="content-header">
        <h1>
            <a href="{{ route('backend.albums.create') }}" class="btn btn-primary btn-block margin-bottom"><i class="fa fa-pencil-square-o"></i>Create</a>

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
                        <h3 class="box-title">Album Management</h3>
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
                                <th>Title</th>
                                <th>Album Image</th>
                                <th>Created_at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($data['rows'] as $i=>$row)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td><img src="{{ asset('images/albums/'.$row->cover_image) }}" alt="{{ $row->cover_image }}" width="150" height="100" height="150"></td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            @if($row->status == 1)
                                                <button type="button" class="btn btn-block btn-success">Active</button>
                                            @else
                                                <button type="button" class="btn btn-block btn-danger">In Active</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('backend.albums.show',$row->id)}}" class="btn btn-warning" type="button" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{route('backend.albums.edit', $row->id)}}" type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>

                                        {!! Form::open(['method'=>'DELETE', 'url' =>route('backend.albums.destroy', $row->id),'style' => 'display:inline']) !!}

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
